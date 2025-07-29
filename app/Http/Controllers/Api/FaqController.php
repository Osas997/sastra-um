<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return response()->json(Faq::all(), 200);
    }

    public function store(StoreFaqRequest $request)
    {
        if (Faq::count() >= 10) {
            return response()->json(['message' => 'Maksimal 10 Isu yang diperbolehkan.'], 400);
        }

        $faq = Faq::create($request->validated());
        return response()->json($faq, 201);
    }


    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $faq->update($request->validated());
        return response()->json($faq);
    }


    public function destroy(Faq $faq)
    {
        $faq->delete();
        return response()->json(['message' => 'Isu berhasil dihapus.']);
    }
}
