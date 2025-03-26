<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoNariz extends Model
{
    protected $table = 'catalogo_nariz';

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(FichaRegistro::class, 'id_tipo_nariz');
    // }
}
