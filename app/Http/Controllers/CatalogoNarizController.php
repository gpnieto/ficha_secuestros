<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogoNarizRequest;
use App\Http\Requests\CreateCatalogoOjosRequest;
use App\Http\Resources\CatalogoNarizResource;
use App\Models\CatalogoNariz;
use Illuminate\Http\Request;

class CatalogoNarizController extends Controller
{

    public function index()
    {
        return response()->json(CatalogoNarizResource::collection(CatalogoNariz::all()));
    }


    public function store(CreateCatalogoNarizRequest $request)
    {
        $nariz = CatalogoNariz::create($request->validated());
        return response()->json(new CatalogoNarizResource($nariz), 201);
    }

    public function show(CatalogoNariz $nariz)
    {
        return $nariz
                ? response()->json(new CatalogoNarizResource($nariz))
                : response()->json(['message' => 'el tipo de nariz ya existe'], 404);
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
