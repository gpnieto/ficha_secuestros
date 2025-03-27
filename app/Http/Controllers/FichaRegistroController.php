<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFichaRegistroRequest;
use App\Http\Resources\FichaRegistroResource;
use App\Models\FichaRegistro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FichaRegistroController extends Controller
{
    public function index()
    {
        return response()->json(FichaRegistroResource::collection(FichaRegistro::all()));
    }

    public function store(CreateFichaRegistroRequest $request)
    {
        $data = $request->all();

        // Subir imagen
        if ($request->hasFile('fotografia')) {
            $data['fotografia'] = $request->file('fotografia')->store('fichas', 'public');
        }

        $registro = FichaRegistro::create($request->validated());
        return response()->json(new FichaRegistroResource($registro), 201);
    }

    public function show(FichaRegistro $fichaRegistro)
    {
        return $fichaRegistro
                      ? response()->json(new FichaRegistroResource($fichaRegistro))
                      : response()->json(['message' => 'Registro no encontrado'], 404);
    }

    public function update(CreateFichaRegistroRequest $request, FichaRegistro $fichaRegistro)
    {
        $data = $request->all();

        // Manejo de imagen
        if ($request->hasFile('fotografia')) {
            // Eliminar la imagen anterior
            if ($fichaRegistro->fotografia && $fichaRegistro->fotografia !== 'default.jpg') {
                Storage::disk('public')->delete($fichaRegistro->fotografia);
            }

            $data['fotografia'] = $request->file('fotografia')->store('fichas', 'public');
        }

        $fichaRegistro->update($data);
        return response()->json(new FichaRegistroResource($fichaRegistro));

    }

    public function destroy(FichaRegistro $fichaRegistro)
    {
        // Eliminar la imagen si no es la predeterminada
        if ($fichaRegistro->fotografia && $fichaRegistro->ficha_fotografia !== 'default.jpg') {
            Storage::disk('public')->delete($fichaRegistro->fotografia);
        }

        $fichaRegistro->delete();
        return response()->json([], 204);
    }
}
