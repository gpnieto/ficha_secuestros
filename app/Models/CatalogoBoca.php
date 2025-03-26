<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoBoca extends Model
{
    protected $table = 'catalogo_boca';

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(FichaRegistro::class, 'id_tipo_boca');
    // }
}
