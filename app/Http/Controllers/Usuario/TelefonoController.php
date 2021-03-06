<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Usuario\Telefono;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Usuario\TelefonoRequest;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telefonos = Telefono::with('tipo')->get()->toArray();
        return response()->json($telefonos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TelefonoRequest $request)
    {
        $telefono = Telefono::create($request->validated());
        return response()->json($telefono->load('tipo'), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function show(Telefono $telefono)
    {
        return response()->json($telefono);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function update(TelefonoRequest $request, Telefono $telefono)
    {
        $telefono->update($request->validated());
        return response()->json($telefono->load('tipo'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function destroy(Telefono $telefono)
    {
        $telefono->delete();
        return response()->json(null, 204);
    }
}
