<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgendaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // pastikan true agar bisa dipakai
    }

    public function rules(): array
    {
        return [
            'judul'   => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu'   => 'required|string|max:20',
            'lokasi'  => 'required|string|max:255',
            'image'   => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'required|string',
            'penyelenggara' => 'required|string|max:255',
        ];
    }
}
