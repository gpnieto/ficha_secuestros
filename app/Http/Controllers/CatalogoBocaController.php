<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogoBocaRequest;
use App\Http\Resources\CatalogoBocaResource;
use App\Models\CatalogoBoca;
use Illuminate\Http\Request;

class CatalogoBocaController extends Controller
{
    public function index()
    {
        return response()->json(CatalogoBocaResource::collection(CatalogoBoca::all()));
    }

    public function store(CreateCatalogoBocaRequest $request)
    {
        $boca = CatalogoBoca::create($request->validated());
        return response()->json(new CatalogoBocaResource($boca), 201);
    }

    public function show(CatalogoBoca $boca)
    {
       return $boca
            ? response()->json( new CatalogoBocaResource($boca))
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
