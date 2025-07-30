<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    protected function responseWithData($data, $status = 200)
    {
        return response()->json(['data' => $data], $status);
    }

    public function index(Request $request)
    {
        $query = Agenda::query();

        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        return $this->responseWithData($query->latest()->get());
    }

    public function show($id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json(['message' => 'Agenda tidak ditemukan'], 404);
        }

        return $this->responseWithData($agenda);
    }

    public function store(StoreAgendaRequest $request)
    {
        $data = $request->validated();
        $agenda = Agenda::create($data);

        return $this->responseWithData($agenda, 201);
    }

    public function update(UpdateAgendaRequest $request, $id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json(['message' => 'Agenda tidak ditemukan'], 404);
        }

        $agenda->update($request->validated());

        return $this->responseWithData($agenda);
    }

    public function destroy($id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json(['message' => 'Agenda tidak ditemukan'], 404);
        }

        $agenda->delete();

        return response()->json(['message' => 'Agenda berhasil dihapus']);
    }
}
