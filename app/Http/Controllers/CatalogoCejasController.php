<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogoCejasRequest;
use App\Http\Resources\CatalogoCejasResource;
use App\Models\CatalogoCeja;
use Illuminate\Http\Request;

class CatalogoCejasController extends Controller
{

    public function index()
    {
        return response()->json(CatalogoCejasResource::collection(CatalogoCeja::all()));
    }

    public function store(CreateCatalogoCejasRequest $request)
    {
        $ceja = CatalogoCeja::create($request->validated());
        return response()->json(new CatalogoCejasResource($ceja), 201);
    }

    public function show(CatalogoCeja $ceja)
    {
        return $ceja
               ? response()->json(new CatalogoCejasResource($ceja) )
               : response()->json(['message' => 'Registro no encontrado'], 404);
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
