<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Konotatif;
use App\Http\Requests\StoreKonotatifRequest;
use App\Http\Requests\UpdateKonotatifRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class KonotatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategori = $request->query('kategori');
        $konotatif = Konotatif::filter($kategori)->paginate(10);

        return ApiResponse::responseWithData($konotatif, 'Success get all konotatif', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKonotatifRequest $request)
    {
        $konotatifReq = $request->validated();
        $konotatif = Konotatif::create($konotatifReq);

        return ApiResponse::responseWithData($konotatif, 'Success create konotatif', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($konotatifId)
    {
        $konotatif = $this->findOne($konotatifId);
        return ApiResponse::responseWithData($konotatif, 'Success get konotatif', 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKonotatifRequest $request, $konotatifId)
    {
        $konotatifReq = $request->validated();
        $konotatif = $this->findOne($konotatifId);

        if (isset($konotatifReq['kategori'])) {
            $konotatif->update([
                'nomina2' => null,
                'verba' => null,
                'adjektiva' => null,
                'adverbia' => null
            ]);
        }

        $konotatif->update($konotatifReq);

        return ApiResponse::responseWithData($konotatif, 'Success update konotatif', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($konotatifId)
    {
        $konotatif = $this->findOne($konotatifId);
        $konotatif->delete();
        return ApiResponse::response('Success delete konotatif', 200);
    }

    public function findOne($konotatifId)
    {
        $konotatif = Konotatif::find($konotatifId);
        if (!$konotatif) {
            throw new NotFoundHttpException('Konotatif not found');
        }
        return $konotatif;
    }
}
