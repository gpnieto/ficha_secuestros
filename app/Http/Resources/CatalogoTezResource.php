<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CatalogoTezResource extends JsonResource {
  public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_tez,
            'descripcion' => $this->descripcion
        ];
    }
}
