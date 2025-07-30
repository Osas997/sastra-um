<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlideshowRequest;
use App\Models\Slideshow;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UpdateSlideshowRequest;
use Illuminate\Support\Facades\Log;

class SlideshowController extends Controller
{
    public function index()
    {
         $data = Slideshow::all();
         return response()->json(['data' => $data]);
    }

    public function store(StoreSlideshowRequest $request)
    {
        $Slideshows = [];

        foreach ($request->file('files', []) as $index => $file) {
            $path = $file->store('Slideshows', 'public');
            $headline = $request->headline[$index] ?? '';

            $Slideshows[] = Slideshow::create([
                'files' => "/storage/$path",
                'headline' => $headline,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Slideshows uploaded successfully',
            'data' => $Slideshows
        ]);
    }
    public function update(UpdateSlideshowRequest $request)
    {
        foreach ($request->slides as $index => $slideData) {

            $slideshow = Slideshow::find($slideData['id']);
            if (!$slideshow) {
                Log::error("Slide dengan ID {$slideData['id']} tidak ditemukan");
                continue;
            }

            if (isset($slideData['headline'])) {
                $slideshow->headline = $slideData['headline'];
            }

            if (isset($slideData['files']) && $slideData['files'] instanceof \Illuminate\Http\UploadedFile) {

                if ($slideshow->files && Storage::disk('public')->exists($slideshow->files)) {
                    Storage::disk('public')->delete($slideshow->files);
                }

                $path = $slideData['files']->store('slides', 'public');
                $slideshow->files = $path;
            }
            $slideshow->save();
        }

        return response()->json([
            'message' => 'Slides updated successfully.'
        ]);
    }


    public function destroy($id)
    {
        $Slideshow = Slideshow::findOrFail($id);

        if ($Slideshow->file) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $Slideshow->file));
        }

        $Slideshow->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Slideshow deleted successfully',
        ]);
    }
}
