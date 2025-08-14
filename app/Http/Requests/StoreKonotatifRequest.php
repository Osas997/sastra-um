<?php

namespace App\Http\Requests;

use App\Enums\KonotatifKategori;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Enum;

class StoreKonotatifRequest extends FormRequest
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
            'nomina' => 'required',
            'contoh_penggunaan' => 'required',
            'makna' => 'required',
            'kata_konotatif' => 'required',
            'fungsi' => 'required',
            'konteks' => 'required',
            'kategori' => ['required', new Enum(KonotatifKategori::class)],
        ];

        $categoryFields = [
            KonotatifKategori::NOMINA->value => 'nomina2',
            KonotatifKategori::VERBA->value => 'verba',
            KonotatifKategori::ADJEKTIVA->value => 'adjektiva',
            KonotatifKategori::ADVERBIA->value => 'adverbia',
        ];

        $kategori = $this->input('kategori');
        if (isset($categoryFields[$kategori])) {
            $rules[$categoryFields[$kategori]] = 'required';
        }

        return $rules;
    }
}
