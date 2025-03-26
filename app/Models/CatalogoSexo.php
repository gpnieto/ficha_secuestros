<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoSexo extends Model
{
    protected $table = 'catalogo_sexo';

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(FichaRegistro::class, 'id_sexo');
    // }
}
