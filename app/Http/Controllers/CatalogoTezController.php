<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogoTezRequest;
use App\Http\Resources\CatalogoTezResource;
use App\Models\CatalogoTez;
use Illuminate\Http\Request;

class CatalogoTezController extends Controller
{
    public function index()
    {
        return response()->json(CatalogoTezResource::collection(CatalogoTez::all()));
    }

    public function store(CreateCatalogoTezRequest $request) {
        $tez = CatalogoTez::create($request->validated());
        return response()->json(new CatalogoTezResource($tez), 201);
    }

    public function show(CatalogoTez $tez) {
        return $tez
            ? response()->json(new CatalogoTezResource($tez))
            : response()->json(['message' => 'Registro no encontrado'], 404 );
    }

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
