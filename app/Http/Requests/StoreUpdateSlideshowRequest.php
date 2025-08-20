<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSlideshowRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'slides' => ['required', 'array'],

            'slides.*.id' => ['nullable', 'integer', 'exists:slideshows,id'],
            'slides.*.headline' => ['nullable', 'string', 'min:5', 'max:255'],
            'slides.*.deskripsi' => ['nullable', 'string'],

            'slides.*.files' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'slides.required' => 'Data slides wajib diisi.',
            'slides.array' => 'Format data slides harus berupa array.',
            'slides.*.id.exists' => 'Slide yang dipilih tidak ditemukan.',
            'slides.*.headline.min' => 'Judul slide minimal 5 karakter.',
            'slides.*.files.image' => 'File harus berupa gambar.',
            'slides.*.files.mimes' => 'Gambar harus berformat JPG atau PNG.',
            'slides.*.files.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
