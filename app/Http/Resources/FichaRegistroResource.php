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
            'apellidoPaterno' => $this->apellido_paterno,
            'apellidoMaterno' => $this->apellido_materno,
            'nombre' => $this->nombre,
            'fechaSecuestro' => $this->fecha_secuestro ? $this->fecha_secuestro->format('d/m/Y') : 'Sin registro',
            'lugarSecuestro' => $this->lugar_secuestro,
            'sexo' => $this->sexo->descripcion ?? 'Sin datos',
            'edad' => $this->edad,
            'fechaNacimiento' => $this->fecha_nacimiento ? $this->fecha_nacimiento->format('d/m/Y') : 'Sin registro',
            'complexion' => $this->complexion,
            'tez' => $this->tez,
            'estatura' => $this->estatura,
            'descripcionCabello' => $this->descripcion_cabello,
            'descripcionFrente' => $this->descripcion_frente,
            'descripcionCejas' => $this->descripcion_cejas,
            'descripcionOjos' => $this->descripcion_ojos,
            'descripcionNariz' => $this->descripcion_nariz,
            'descripcionNoca' => $this->descripcion_boca,
            'descripcionOrejas' => $this->descripcion_orejas,
            'descripcionLabios' => $this->descripcion_labios,
            'descripcionMenton' => $this->descripcion_menton,
            'descripcionCara' => $this->descripcion_cara,
            'barbaBigote' => $this->barba_bigote,
            'señasParticulares' => $this->señas_particulares,
            'ropa' => $this->ropa,
            'fotografia' => asset($this->fotografia)
        ];
    }

}
