<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\GayaBahasa;
use App\Http\Requests\StoreGayaBahasaRequest;
use App\Http\Requests\UpdateGayaBahasaRequest;

class GayaBahasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gayaBahasa = GayaBahasa::paginate(10);
        return ApiResponse::responseWithData($gayaBahasa, 'Success get all gaya bahasa', 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGayaBahasaRequest $request)
    {
        $data = $request->validated();
        $gayaBahasa = GayaBahasa::create($data);
        return ApiResponse::responseWithData($gayaBahasa, 'Success create gaya bahasa', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(GayaBahasa $gayaBahasa)
    {
        $gayaBahasa = GayaBahasa::find($gayaBahasa->id);
        if (!$gayaBahasa) {
            return response()->json(['message' => 'Gaya bahasa tidak ditemukan'], 404);
        }
        return ApiResponse::responseWithData($gayaBahasa, 'Success get gaya bahasa', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGayaBahasaRequest $request, GayaBahasa $gayaBahasa)
    {
        $gayaBahasa = GayaBahasa::find($gayaBahasa->id);
        if (!$gayaBahasa) {
            return response()->json(['message' => 'Gaya bahasa tidak ditemukan'], 404);
        }
        $gayaBahasa->update($request->validated());
        return ApiResponse::responseWithData($gayaBahasa, 'Success update gaya bahasa', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GayaBahasa $gayaBahasa)
    {
        $gayaBahasa = GayaBahasa::find($gayaBahasa->id);
        if (!$gayaBahasa) {
            return response()->json(['message' => 'Gaya bahasa tidak ditemukan'], 404);
        }
        $gayaBahasa->delete();
        return ApiResponse::responseWithData(['message' => 'Gaya bahasa berhasil dihapus'], 200);
    }
}
