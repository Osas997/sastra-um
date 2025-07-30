<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlideshowRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'files.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'headline' => 'required|array',
            'headline.*' => 'string|max:255'
        ];
    }
}
