<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $query = Agenda::query();

        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        return ApiResponse::responseWithData($query->latest()->get(), 'Success get all agenda');
    }

    public function show($id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json(['message' => 'Agenda tidak ditemukan'], 404);
        }

        return ApiResponse::responseWithData($agenda, 'Success get agenda');
    }

    public function store(StoreAgendaRequest $request)
    {
        $data = $request->validated();
        $agenda = Agenda::create($data);

        return ApiResponse::responseWithData($agenda, 'Success create agenda', Response::HTTP_CREATED);
    }

    public function update(UpdateAgendaRequest $request, $id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            throw new NotFoundHttpException('Agenda tidak ditemukan');
        }

        $agenda->update($request->validated());

        return ApiResponse::responseWithData($agenda, 'Success update agenda');
    }

    public function destroy($id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            throw new NotFoundHttpException('Agenda tidak ditemukan');
        }

        $agenda->delete();

        return ApiResponse::response('Success delete agenda');
    }
}
