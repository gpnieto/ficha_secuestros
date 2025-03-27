<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogoMentonRequest;
use App\Http\Resources\CatalogoMentonResource;
use App\Models\CatalogoBoca;
use App\Models\CatalogoMenton;
use Illuminate\Http\Request;

class CatalogoMentonController extends Controller
{

    public function index()
    {
        return response()->json(CatalogoMentonResource::collection(CatalogoMenton::all()));
    }

    public function store(CreateCatalogoMentonRequest $request)
    {
        $menton = CatalogoMenton::create($request->validated());
        return response()->json(new CatalogoMentonResource($menton), 201);
    }

    public function show(CatalogoMenton $menton)
    {
        return $menton
                    ? response()->json(new CatalogoMentonResource($menton))
                    : response()->json( ['message' => 'Registro no encontrado'], 404);
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
