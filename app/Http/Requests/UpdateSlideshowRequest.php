<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSlideshowRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'slides.*.id' => 'required|exists:slideshows,id',
            'slides.*.headline' => 'nullable|string|max:255',
            'slides.*.files' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',

        ];
    }

    public function prepareForValidation()
    {
        if ($this->isMethod('put')) {
            $this->merge([
                'slides' => $this->get('slides', []),
            ]);
        }
    }
}
