<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class FichaRegistro extends Model {
    use SoftDeletes;
    protected $table = 'fichas_registro';

    protected $fillable = [
        'nuc',
        'apellido_paterno',
        'apellido_materno',
        'nombre',
        'fecha_secuestro',
        'lugar_secuestro',
        'sexo',
        'edad',
        'fecha_nacimiento',
        'complexion',
        'tez',
        'estatura',
        'descripcion_cabello',
        'descripcion_frente',
        'descripcion_cejas',
        'descripcion_ojos',
        'descripcion_nariz',
        'descripcion_boca',
        'descripcion_orejas',
        'descripcion_labios',
        'descripcion_menton',
        'descripcion_cara',
        'barba_bigote',
        'señas_particulares',
        'ropa',
        'fotografia'
    ];


    public $attributes = [
        'fotografia' => 'SIN DATO',
    ];

     // Obtener la URL de la imagen
     public function getFotografiaUrlAttribute() {
        return Storage::url($this->fotografia);
     }

     protected $dates = [
      'fecha_secuestro', 'fecha_nacimiento',
     ];


}
