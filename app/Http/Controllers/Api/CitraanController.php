<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Citraan;
use App\Http\Requests\StoreCitraanRequest;
use App\Http\Requests\UpdateCitraanRequest;


class CitraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $citraan = Citraan::paginate(10);
        return ApiResponse::responseWithData($citraan, 'Success get all citraan', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCitraanRequest $request)
    {
        $data = $request->validated();
        $citraan = Citraan::create($data);

        return ApiResponse::responseWithData($citraan, 'Success create citraan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Citraan $citraan)
    {
        $citraan = Citraan::find($citraan->id);
        if (!$citraan) {
            return response()->json(['message' => 'Citraan tidak ditemukan'], 404);
        }
        return ApiResponse::responseWithData($citraan, 'Success get citraan', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCitraanRequest $request, Citraan $citraan)
    {
        $citraan = Citraan::find($citraan->id);
        if (!$citraan) {
            return response()->json(['message' => 'Citraan tidak ditemukan'], 404); 
        }
        $citraan->update($request->validated());
        return ApiResponse::responseWithData($citraan, 'Success update citraan', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citraan $citraan)
    {
        $citraan = Citraan::find($citraan->id);
        if (!$citraan) {
            return response()->json(['message' => 'Citraan tidak ditemukan'], 404);
        }
        $citraan->delete();
        return ApiResponse::responseWithData(['message' => 'Citraan berhasil dihapus.'], 200);
    }
}
