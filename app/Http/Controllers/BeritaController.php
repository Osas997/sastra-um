<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::latest()->paginate(10);
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
    public function store(StoreBeritaRequest $request)
    {
        $beritaRequest = $request->validated();

        $beritaRequest['slug'] = $this->generateSlug($beritaRequest['judul']);

        $beritaRequest['gambar'] = $request->file('gambar')->storeAs('berita', uniqid() . '.' . $request->file('gambar')->extension(), 'public');

        Berita::create($beritaRequest);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBeritaRequest $request, Berita $berita)
    {
        $beritaRequest = $request->validated();
        dd($beritaRequest);

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

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
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
