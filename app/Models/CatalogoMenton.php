<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoMenton extends Model
{
    protected $table = 'catalogo_menton';

    protected $fillable = [
           'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(fichaRegistro::class, 'id_tipo_menton');
    // }
}
