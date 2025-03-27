<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogoOjosRequest;
use App\Http\Resources\CatalogoOjosResource;
use App\Models\CatalogoOjo;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class CatalogoOjosController extends Controller
{
    public function index()
    {
        return response()->json(CatalogoOjosResource::collection(CatalogoOjo::all()));
    }

    public function store(CreateCatalogoOjosRequest $request)
    {
        $ojo = CatalogoOjo::create($request->validated());
        return response()->json(new CatalogoOjosResource($ojo), 201);
    }

    public function show(CatalogoOjo $ojo)
    {
        return $ojo
                ? response()->json(new CatalogoOjosResource($ojo))
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
