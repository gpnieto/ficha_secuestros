<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogoFrenteRequest;
use App\Http\Resources\CatalogoFrenteResource;
use App\Models\CatalogoFrente;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class CatalogoFrenteController extends Controller
{

    public function index()
    {
        return response()->json(CatalogoFrenteResource::collection(CatalogoFrente::all()));
    }

    public function store(CreateCatalogoFrenteRequest $request)
    {
        $frente = CatalogoFrente::create($request->validated());
        return response()->json(new CatalogoFrenteResource($frente), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CatalogoFrente $frente)
    {
        return $frente
                ? response()->json(new CatalogoFrenteResource($frente) )
                : response()->json(['message' => 'Registro no encontrado'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
