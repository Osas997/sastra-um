<?php

namespace App\Http\Requests;

use App\Enums\KonotatifKategori;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateKonotatifRequest extends FormRequest
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
        $rules = [
            'nomina' => 'sometimes|required',
            'contoh_penggunaan' => 'sometimes|required',
            'makna' => 'sometimes|required',
            'kata_konotatif' => 'sometimes|required',
            'fungsi' => 'sometimes|required',
            'konteks' => 'sometimes|required',
            'kategori' => ['sometimes', 'required', new Enum(KonotatifKategori::class)],
        ];

        $categoryFields = [
            KonotatifKategori::NOMINA->value => 'nomina2',
            KonotatifKategori::VERBA->value => 'verba',
            KonotatifKategori::ADJEKTIVA->value => 'adjektiva',
            KonotatifKategori::ADVERBIA->value => 'adverbia',
        ];

        $kategori = $this->input('kategori');
        if (isset($kategori) && isset($categoryFields[$kategori])) {
            $rules[$categoryFields[$kategori]] = 'required';
        }

        return $rules;
    }
}
