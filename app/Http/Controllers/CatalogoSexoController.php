<?php

namespace App\Http\Controllers;

use App\Models\CatalogoSexo;
use Illuminate\Http\Request;

class CatalogoSexoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(CatalogoSexo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string'
        ]);

        $sexo = CatalogoSexo::create($validated);
        return response()->json($sexo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sexo = CatalogoSexo::find($id);
        return $sexo ? response()->json($sexo) : response()->json(['message' => 'Registro no encontrado'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sexo = CatalogoSexo::findOrFail($id);
        $sexo->update($request->all());
        return response()->json($sexo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
