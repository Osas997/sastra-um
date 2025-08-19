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
        $rules = [
            'slides' => ['required', 'array'],

            'slides.*.id' => ['nullable', 'integer', 'exists:slideshows,id'],
            'slides.*.headline' => ['required', 'string', 'min:5', 'max:255'],
            'slides.*.deskripsi' => ['nullable', 'string'],

            'slides.*.files' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'slides.required' => 'Data slides wajib diisi.',
            'slides.array' => 'Format data slides harus berupa array.',
            'slides.*.id.exists' => 'Slide yang dipilih tidak ditemukan.',
            'slides.*.headline.min' => 'Judul slide minimal 5 karakter.',
            'slides.*.files.image' => 'File harus berupa gambar.',
            'slides.*.files.mimes' => 'Gambar harus berformat JPG atau PNG.',
            'slides.*.files.max' => 'Ukuran gambar maksimal 2MB.',
        ];

        foreach ($this->input('slides', []) as $index => $slide) {
            $slideNumber = $index + 1;
            $messages["slides.$index.files.required"] = "Gambar untuk Slide ke-$slideNumber wajib diunggah.";
            $messages["slides.$index.headline.required"] = "Judul untuk Slide ke-$slideNumber wajib diisi.";
        }

        return $messages;
    }


    public function withValidator($validator)
    {
        $slides = $this->input('slides', []);

        foreach ($slides as $index => $slide) {
            if (empty($slide['id'])) {
                $validator->sometimes("slides.$index.files", 'required', function () {
                    return true;
                });
            }
        }
    }


    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }
}
