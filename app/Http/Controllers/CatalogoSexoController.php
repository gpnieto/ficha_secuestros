<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogoSexoRequest;
use App\Http\Requests\UpdateCatalogoSexoRequest;
use App\Http\Resources\CatalogoSexoResource;
use App\Models\CatalogoSexo;
use Illuminate\Http\Request;

class CatalogoSexoController extends Controller {
    public function index() {
        return response()->json(CatalogoSexoResource::collection(CatalogoSexo::all()));
    }

    public function store(CreateCatalogoSexoRequest $request) {
        $sexo = CatalogoSexo::create($request->validated());
        return response()->json(new CatalogoSexoResource($sexo), 201);
    }

    public function show(CatalogoSexo $sexo) {
        return $sexo
            ? response()->json( new CatalogoSexoResource($sexo) )
            : response()->json( ['message' => 'Registro no encontrado' ], 404);
    }

    public function update(UpdateCatalogoSexoRequest $request, CatalogoSexo $sexo) {
        $sexo->update($request->all());
        return response()->json(new CatalogoSexoResource($sexo));
    }

    public function destroy(CatalogoSexo $sexo) {
        $sexo->delete();
        return response()->json([]);
    }
}
