<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoCara extends Model
{
    protected $table = 'catalogo_cara';

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(fichaRegistro::class, 'id_tipo_cara');
    // }
}
