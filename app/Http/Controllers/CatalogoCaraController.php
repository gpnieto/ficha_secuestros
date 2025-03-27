<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogoCaraRequest;
use App\Http\Resources\CatalogoCaraResource;
use App\Models\CatalogoCara;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class CatalogoCaraController extends Controller
{
    public function index()
    {
        return response()->json(CatalogoCaraResource::collection(CatalogoCara::all()));
    }

    public function store(CreateCatalogoCaraRequest $request)
    {
        $cara = CatalogoCara::create($request->validated());
        return response()->json(new CatalogoCaraResource($cara), 201);
    }

    public function show(CatalogoCara $cara)
    {
       return $cara
            ? response()->json(new CatalogoCaraResource($cara))
            : response()->json(['Message' => 'Registro no encontrado'], 404);
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
