<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

class RegisterResource extends JsonResource {
    public function toArray(Request $request): array {
        $defaultPath = str_replace('\\', '/', public_path(($this->catalogo_sexo_id == 1) ? 'img/default_male.png' : 'img/default_female.png'));
        $defaultContent = file_get_contents($defaultPath);

        $hasImage = $this->fotografia
            && Storage::disk('public')->exists($this->fotografia)
            && in_array(strtolower(pathinfo($this->fotografia, PATHINFO_EXTENSION)), ['png', 'jpg', 'jpeg', 'gif', 'bmp', 'webp']);
        return [
            'id' => $this->id,
            'nuc' => $this->nuc ?? 'SIN DATO',
            'apellidoPaterno' => $this->apellido_paterno ?? 'SIN DATO',
            'apellidoMaterno' => $this->apellido_materno ?? 'SIN DATO',
            'nombre' => $this->nombre ?? 'SIN DATO',
            'fechaSecuestro' => $this->fecha_secuestro ? $this->fecha_secuestro->format('d/m/Y') : today()->format('d/m/Y'),
            'lugarSecuestro' => $this->lugar_secuestro ?? 'SIN DATO',
            'sexo' => $this->sexo->descripcion ?? 'SIN DATO',
            'idSexo' => $this->catalogo_sexo_id ?? 'SIN DATO',
            'curp' => $this->curp ?? 'SIN DATO',
            'edad' => $this->edad ?? 'SIN DATO',
            'fechaNacimiento' => $this->fecha_nacimiento ? $this->fecha_nacimiento->format('d/m/Y') : today()->format('d/m/Y'),
            'complexion' => $this->complexion ?? 'SIN DATO',
            'tez' => $this->tez ?? 'SIN DATO',
            'estatura' => $this->estatura ?? 'SIN DATO',
            'descripcionCabello' => $this->descripcion_cabello ?? 'SIN DATO',
            'descripcionFrente' => $this->descripcion_frente ?? 'SIN DATO',
            'descripcionCejas' => $this->descripcion_cejas ?? 'SIN DATO',
            'descripcionOjos' => $this->descripcion_ojos ?? 'SIN DATO',
            'descripcionNariz' => $this->descripcion_nariz ?? 'SIN DATO',
            'descripcionNoca' => $this->descripcion_boca ?? 'SIN DATO',
            'descripcionOrejas' => $this->descripcion_orejas ?? 'SIN DATO',
            'descripcionLabios' => $this->descripcion_labios ?? 'SIN DATO',
            'descripcionMenton' => $this->descripcion_menton ?? 'SIN DATO',
            'descripcionCara' => $this->descripcion_cara ?? 'SIN DATO',
            'barbaBigote' => $this->barba_bigote ?? 'SIN DATO',
            'señasParticulares' => $this->señas_particulares ?? 'SIN DATO',
            'ropa' => $this->ropa ?? 'SIN DATO',
            'fotografia' => asset($hasImage ? $this->fotografia : (($this->catalogo_sexo_id == 1) ? 'img/default_male.png' : 'img/default_female.png')),
            'encodedImage' => $hasImage
                ? 'data:image/' . pathinfo($this->fotografia, PATHINFO_EXTENSION) . ';base64,' . base64_encode(Storage::disk('public')->get($this->fotografia))
                : 'data:image/png;base64,' . base64_encode($defaultContent),

        ];
    }

}
