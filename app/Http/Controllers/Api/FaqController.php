<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected function responseWithData($data, $status = 200)
    {
        return response()->json($data, $status);
    }

    public function index()
    {
        return $this->responseWithData(Faq::all(), 200);
    }

    public function store(StoreFaqRequest $request)
    {
        if (Faq::count() >= 10) {
            return $this->responseWithData(['message' => 'Maksimal 10 Isu yang diperbolehkan.'], 400);
        }

        $faq = Faq::create($request->validated());
        return $this->responseWithData($faq, 201);
    }

    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $faq->update($request->validated());
        return $this->responseWithData($faq);
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return $this->responseWithData(['message' => 'Isu berhasil dihapus.']);
    }
}
