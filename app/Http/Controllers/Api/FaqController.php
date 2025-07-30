<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class FaqController extends Controller
{
    public function index()
    {
        return ApiResponse::responseWithData(Faq::all(), 'Success get all faq');
    }

    public function store(StoreFaqRequest $request)
    {
        if (Faq::count() >= 10) {
            throw new BadRequestHttpException('Maksimal 10 Isu yang diperbolehkan.');
        }

        $faq = Faq::create($request->validated());
        return ApiResponse::responseWithData($faq, 'Success create faq', Response::HTTP_CREATED);
    }

    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $faq->update($request->validated());
        return ApiResponse::responseWithData($faq, 'Success update faq');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return ApiResponse::response('Success delete faq');
    }
}
