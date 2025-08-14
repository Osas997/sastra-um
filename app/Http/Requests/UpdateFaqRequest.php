<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'pertanyaan' => 'required|string|max:255|unique:faqs,pertanyaan,' . $this->faq->id,
            'jawaban' => 'required|string',
            'kategori' => 'required|in:Akademik,Fasilitas,Fakultas,Dan lain lain',
            'tanggal' => 'required|date',
            'status' => 'required|in:draf,terunggah',
        ];
    }
}
