<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreUpdateSlideshowRequest;
use App\Models\Slideshow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $slideshow = Slideshow::all();
            return ApiResponse::responseWithData($slideshow, 'Slideshow data loaded successfully', 200);
        } catch (\Exception $e) {
            return ApiResponse::response('Error loading slideshow data', 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSlideshowRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            foreach ($data['slides'] as $slideData) {
                // Update
                if (!empty($slideData['id'])) {
                    $slide = Slideshow::find($slideData['id']);

                    if (isset($slideData['files']) && $slideData['files'] instanceof \Illuminate\Http\UploadedFile) {
                        if ($slide->files) {
                            Storage::disk('public')->delete($slide->files);
                        }
                        $slideData['files'] = $slideData['files']->store('slideshows', 'public');
                    } else {
                        unset($slideData['files']);
                    }

                    $slide->update($slideData);
                } else {
                    $maxSlides = 1;
                    $slidesCount = Slideshow::count();
                    if ($slidesCount >= $maxSlides) {
                        return ApiResponse::response('Maksimal Hanya ' . $maxSlides . ' slide', 422);
                    }
                    // Create
                    $slideData['files'] = $slideData['files']->store('slideshows', 'public');

                    Slideshow::create($slideData);
                }
            }

            DB::commit();

            return ApiResponse::response('Slideshow berhasil disimpan', 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::response('Terjadi kesalahan saat menyimpan data', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slideshow $slideshow)
    {
        try {
            if ($slideshow->files) {
                Storage::disk('public')->delete($slideshow->files);
            }

            $slideshow->delete();

            return ApiResponse::response('Slideshow berhasil dihapus', 200);
        } catch (\Exception $e) {
            return ApiResponse::response('Terjadi kesalahan saat menghapus data', 500);
        }
    }
}
