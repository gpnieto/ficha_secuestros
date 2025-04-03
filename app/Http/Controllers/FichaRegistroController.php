<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFichaRegistroRequest;
use App\Http\Requests\ValidateImageRequest;
use App\Http\Resources\FichaRegistroResource;
use App\Models\FichaRegistro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FichaRegistroController extends Controller {
    public function index() {
        return response()->json(FichaRegistroResource::collection(FichaRegistro::all()));
    }

    public function store(CreateFichaRegistroRequest $request) {
        // Subir imagen
//        if ($request->hasFile('fotografia')) {
//            $data['fotografia'] = $request->file('fotografia')->store('fichas', 'public');
//        }
        $registro = FichaRegistro::create($request->validated());
        return response()->json(new FichaRegistroResource($registro), 201);
    }

    public function show(FichaRegistro $registro) {
        return $registro
            ? response()->json(new FichaRegistroResource($registro))
            : response()->json(['message' => 'Registro no encontrado'], 404);
    }

    public function update(CreateFichaRegistroRequest $request, FichaRegistro $fichaRegistro) {
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

    public function destroy(FichaRegistro $fichaRegistro) {
        // Eliminar la imagen si no es la predeterminada
        if ($fichaRegistro->fotografia && $fichaRegistro->ficha_fotografia !== 'default.jpg') {
            Storage::disk('public')->delete($fichaRegistro->fotografia);
        }

        $fichaRegistro->delete();
        return response()->json([], 204);
    }

    public function uploadPicture(FichaRegistro $registro, ValidateImageRequest $request){
        $registro->update([
            'fotografia' => $request->file('image')->store('fichas', 'public')
        ]);

        return response()->json(new FichaRegistroResource($registro), 201);
    }

    public function listRecords($cantidad) {
        try {
            // Obtener un número especificado de registros
            $registros = FichaRegistro::limit($cantidad)->get();

            // Verificar si se encontraron registros
            return $registros->isNotEmpty()
                ? response()->json(FichaRegistroResource::collection($registro))
                : response()->json(['message' => 'No se encontraron registros que listar'], 404);
            }
        catch (\Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }

    }
}
