<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogoComplexionRequest;
use App\Http\Resources\CatalogoComplexionResource;
use App\Models\CatalogoComplexion;
use Illuminate\Http\Request;

class CatalogoComplexionController extends Controller
{
    public function index() {
        return response()->json(CatalogoComplexionResource::collection(CatalogoComplexion::all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCatalogoComplexionRequest $request) {
        $complexion = CatalogoComplexion::create($request->validated());
        return response()->json(new CatalogoComplexionResource($complexion), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CatalogoComplexion $complexion){
        return $complexion
            ? response()->json( new CatalogoComplexionResource($complexion) )
            : response()->json( ['message' => 'Registro no encontrado' ], 404);
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
