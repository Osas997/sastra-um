<?php

namespace App\Http\Controllers;

use App\Enums\KonotatifKategori;
use App\Http\Requests\StoreKonotatifRequest;
use App\Http\Requests\UpdateKonotatifRequest;
use App\Models\Konotatif;
use Illuminate\Http\Request;

class KonotatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = min($request->query('limit', 10), 100);

        $category = $request->query('category');

        $category && $this->checkCategory($category);

        $konotatif = Konotatif::filter($request->input('search'), $category)->paginate($limit);
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
    public function store(StoreKonotatifRequest $request)
    {
        $konotatifReq = $request->validated();
        Konotatif::create($konotatifReq);

        return redirect()->route('konotatif.index')->with('success', 'Konotatif berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Konotatif $konotatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konotatif $konotatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKonotatifRequest $request, Konotatif $konotatif)
    {
        $konotatifReq = $request->validated();

        if (isset($konotatifReq['kategori']) && $konotatifReq['kategori'] != $konotatif->kategori) {
            $konotatif->update([
                'nomina2' => null,
                'verba' => null,
                'adjektiva' => null,
                'adverbia' => null
            ]);
        }

        $konotatif->update($konotatifReq);

        return redirect()->route('konotatif.index')->with('success', 'Konotatif berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konotatif $konotatif)
    {
        $konotatif->delete();

        return redirect()->route('konotatif.index')->with('success', 'Konotatif berhasil dihapus');
    }

    private function checkCategory($category)
    {
        $isValidCategory = KonotatifKategori::tryFrom($category);

        if (!$isValidCategory) {
            abort(400, 'Category is not valid');
        }

        return true;
    }
}
