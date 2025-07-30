<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use App\Http\Resources\BeritaCmsResource;
use App\Http\Resources\BeritaResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::latest()->paginate(10);

        return ApiResponse::responseWithData(BeritaCmsResource::collection($berita), 'Success get all berita', Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBeritaRequest $request)
    {
        $beritaRequest = $request->validated();

        $beritaRequest['slug'] = $this->generateSlug($beritaRequest['judul']);

        $beritaRequest['gambar'] = $request->file('gambar')->storeAs('berita', uniqid() . '.' . $request->file('gambar')->extension(), 'public');

        $berita = Berita::create($beritaRequest);

        return ApiResponse::responseWithData($berita, 'Success create berita', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($beritaId)
    {
        $berita = $this->findOne($beritaId);

        return ApiResponse::responseWithData($berita, 'Success get berita', Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBeritaRequest $request, $beritaId)
    {
        $berita = $this->findOne($beritaId);

        $beritaRequest = $request->validated();

        if (isset($beritaRequest['judul']) && $beritaRequest['judul'] != $berita->judul) {
            $beritaRequest['slug'] = $this->generateSlug($beritaRequest['judul']);
        }

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $beritaRequest['gambar'] = $request->file('gambar')->storeAs('berita', uniqid() . '.' . $request->file('gambar')->extension(), 'public');
        }

        $berita->update($beritaRequest);

        return ApiResponse::responseWithData($berita, 'Success update berita', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($beritaId)
    {
        $berita = $this->findOne($beritaId);

        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return ApiResponse::response('Success delete berita', Response::HTTP_OK);
    }

    public function publicIndex()
    {
        $berita = Berita::published()->latest()->paginate(10);

        return ApiResponse::responseWithData(BeritaResource::collection($berita), 'Success get all berita', Response::HTTP_OK);
    }

    public function publicShow($beritaId)
    {
        $berita = Berita::published()->find($beritaId);
        if (!$berita) {
            throw new NotFoundHttpException('Berita not found');
        }
        return ApiResponse::responseWithData(new BeritaResource($berita), 'Success get berita', Response::HTTP_OK);
    }

    public function findOne($beritaId)
    {
        $berita = Berita::find($beritaId);
        if (!$berita) {
            throw new NotFoundHttpException('Berita not found');
        }
        return $berita;
    }

    public function generateSlug($title)
    {
        $slug = Str::slug($title);

        $originalSlug = $slug;
        while (Berita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . uniqid();
        }

        return $slug;
    }
}
