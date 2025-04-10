<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFichaRegistroRequest;
use App\Http\Requests\ValidateImageRequest;
use App\Http\Resources\FichaRegistroResource;
use App\Models\FichaRegistro;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Laravel\Facades\Image;

class FichaRegistroController extends Controller {
    public function index(Request $request) {
        $limit = $request->query('limit', 10);
        $search = $request->query('search', '');

        $query = FichaRegistro::query()->latest();

        logs()->info($search);

        if ($search) {
            $terms = explode(' ', $search);

            $query->where(function($q) use ($terms) {
                foreach ($terms as $term) {
                    $q->where(function($innerQuery) use ($term) {
                        $innerQuery->where('nuc', 'LIKE', "%$term%")
                            ->orWhere('nombre', 'LIKE', "%$term%")
                            ->orWhere('apellido_paterno', 'LIKE', "%$term%")
                            ->orWhere('apellido_materno', 'LIKE', "%$term%");
                    });
                }
            });
        }

        $registers = $query->paginate($limit);

        $resource = FichaRegistroResource::collection($registers);

        return response()->json($resource->response()->getData(true));
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

    public function update(Request $request, FichaRegistro $registro) {
        $registro->update($request->all());
        return response()->json(new FichaRegistroResource($registro));
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
        $file = $request->file('image');
        ini_set('memory_limit', '2048M');
        $size = config('image.storage_sizes.width');
        $height = config('image.storage_sizes.height');

        if($file && $file->isValid()){
            $image = Image::read($file->path())->resize($size, $height);
            $storagePath = 'fichas/' . Str::random() . '.' . $file->getClientOriginalExtension();

            $saved = Storage::disk('public')->put($storagePath, $image->encodeByExtension($file->getClientOriginalExtension(), quality: 100));

            if($saved){
                $registro->update([
                    'fotografia' => $storagePath
                ]);
            }

            return response()->json(new FichaRegistroResource($registro), 201);
        }

        return response()->json(['message' => 'Imagen no valida'], 403);
    }
}
