<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // ubah ke false jika hanya role tertentu yang boleh
    }

    public function rules(): array
    {
        return [
            'pertanyaan' => 'required|string|max:255|unique:faqs,pertanyaan',
            'jawaban' => 'required|string',
            'kategori' => 'required|in:Akademik,Fasilitas,Fakultas,Dan lain lain',
            'tanggal' => 'required|date',
            'status' => 'required|in:draf,terunggah',
        ];
    }
}
