<?php

namespace App\Http\Requests;

use App\Enums\CitranKategori;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateCitraanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'lanskap' => 'sometimes|required|string|max:255',
            'data' => 'sometimes|required|string',
            'domain_sumber' => 'sometimes|required|string|max:255',
            'domain_makna' => 'sometimes|required|string|max:255',
            'konteks' => 'sometimes|required|string|max:255',
            'kategori' => ['sometimes', 'required', new Enum(CitranKategori::class)],
        ];
    }
}
