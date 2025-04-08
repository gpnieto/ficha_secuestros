<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FichaRegistroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nuc' => $this->nuc,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'nombre' => $this->nombre,
            'fecha_secuestro' => $this->fecha_secuestro ? $this->fecha_secuestro->format('d/m/Y') : 'Sin registro',
            'lugar_secuestro' => $this->lugar_secuestro,
            'sexo' => $this->sexo->descripcion ?? 'Sin datos',
            'edad' => $this->edad,
            'fecha_nacimiento' => $this->fecha_nacimiento ? $this->fecha_nacimiento->format('d/m/Y') : 'Sin registro',
            'complexion' => $this->complexion,
            'tez' => $this->tez,
            'estatura' => $this->estatura,
            'descripcion_cabello' => $this->descripcion_cabello,
            'descripcion_frente' => $this->descripcion_frente,
            'descripcion_cejas' => $this->descripcion_cejas,
            'descripcion_ojos' => $this->descripcion_ojos,
            'descripcion_nariz' => $this->descripcion_nariz,
            'descripcion_boca' => $this->descripcion_boca,
            'descripcion_orejas' => $this->descripcion_orejas,
            'descripcion_labios' => $this->descripcion_labios,
            'descripcion_menton' => $this->descripcion_menton,
            'descripcion_cara' => $this->descripcion_cara,
            'barba_bigote' => $this->barba_bigote,
            'señas_particulares' => $this->señas_particulares,
            'ropa' => $this->ropa,
            'fotografia' => asset($this->fotografia)
        ];
    }

}
