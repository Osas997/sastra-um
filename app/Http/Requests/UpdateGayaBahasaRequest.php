<?php

namespace App\Http\Requests;

use App\Enums\GayaBahasaKategori;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateGayaBahasaRequest extends FormRequest
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
            'contoh_kalimat' => 'sometimes|required|string|max:255',
            'frasa_kunci' => 'sometimes|required|string|max:255',
            'frasa_tipe' => 'sometimes|required|string|max:255',
            'makna_kiasan' => 'sometimes|required|string|max:255',
            'keterangan_konteks' => 'sometimes|required|string|max:255',
            'kategori' => ['sometimes', 'required',  new Enum(GayaBahasaKategori::class)],
        ];
    }
}
