<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgendaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul'   => 'sometimes|required|string|max:255',
            'tanggal' => 'sometimes|required|date',
            'waktu'   => 'sometimes|required|string|max:20',
            'lokasi'  => 'sometimes|required|string|max:255',
            'image'   => 'sometimes|required|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'sometimes|required|string',
            'penyelenggara' => 'sometimes|required|string|max:255',
        ];
    }
}
