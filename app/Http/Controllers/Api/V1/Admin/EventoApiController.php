<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Http\Resources\Admin\EventoResource;
use App\Models\Evento;
use App\Models\Lugar;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventoResource(Evento::with(['lugar', 'ingresos', 'ingresos.medioDePago','egresos', 'egresos.egreso_categoria'])->get());
    }

    public function store(StoreEventoRequest $request)
    {
        $evento = Evento::create($request->validated());

        return (new EventoResource($evento))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('user_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'lugar' => Lugar::get(['id', 'descripcion']),
            ],
        ]);
    }

    public function show(Evento $evento)
    {
        abort_if(Gate::denies('user_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventoResource($evento->load(['lugar']));
    }

    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        $evento->update($request->validated());

        return (new EventoResource($evento))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Evento $evento)
    {
        abort_if(Gate::denies('user_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new EventoResource($evento->load(['lugar'])),
            'meta' => [
                'lugar' => Lugar::get(['id', 'descripcion']),
            ],
        ]);
    }

    public function destroy(Evento $evento)
    {
        abort_if(Gate::denies('user_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $evento->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}