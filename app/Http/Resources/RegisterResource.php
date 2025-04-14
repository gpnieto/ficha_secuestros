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
            'nuc' => $this->nuc,
            'apellidoPaterno' => $this->apellido_paterno,
            'apellidoMaterno' => $this->apellido_materno,
            'nombre' => $this->nombre,
            'fechaSecuestro' => $this->fecha_secuestro->format('d/m/Y'),
            'lugarSecuestro' => $this->lugar_secuestro,
            'sexo' => $this->sexo->descripcion,
            'idSexo' => $this->catalogo_sexo_id,
            'edad' => $this->edad,
            'fechaNacimiento' => $this->fecha_nacimiento->format('d/m/Y'),
            'complexion' => $this->complexion ?? 'Sin datos',
            'tez' => $this->tez ?? 'Sin datos',
            'estatura' => $this->estatura ?? 'Sin datos',
            'descripcionCabello' => $this->descripcion_cabello ?? 'Sin datos',
            'descripcionFrente' => $this->descripcion_frente ?? 'Sin datos',
            'descripcionCejas' => $this->descripcion_cejas ?? 'Sin datos',
            'descripcionOjos' => $this->descripcion_ojos ?? 'Sin datos',
            'descripcionNariz' => $this->descripcion_nariz ?? 'Sin datos',
            'descripcionNoca' => $this->descripcion_boca ?? 'Sin datos',
            'descripcionOrejas' => $this->descripcion_orejas ?? 'Sin datos',
            'descripcionLabios' => $this->descripcion_labios ?? 'Sin datos',
            'descripcionMenton' => $this->descripcion_menton ?? 'Sin datos',
            'descripcionCara' => $this->descripcion_cara ?? 'Sin datos',
            'barbaBigote' => $this->barba_bigote ?? 'Sin datos',
            'señasParticulares' => $this->señas_particulares ?? 'Sin datos',
            'ropa' => $this->ropa ?? 'Sin datos',
            'fotografia' => asset($hasImage ? $this->fotografia : (($this->catalogo_sexo_id == 1) ? 'img/default_male.png' : 'img/default_female.png')),
            'encodedImage' => $hasImage
                ? 'data:image/' . pathinfo($this->fotografia, PATHINFO_EXTENSION) . ';base64,' . base64_encode(Storage::disk('public')->get($this->fotografia))
                : 'data:image/png;base64,' . base64_encode($defaultContent),

        ];
    }

}
