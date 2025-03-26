<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoCeja extends Model
{
    protected $table = 'catalogo_cejas';

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(FichaRegistro::class, 'id_tipo_cejas');
    // }
}
