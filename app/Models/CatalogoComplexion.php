<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoComplexion extends Model
{
    protected $primaryKey = 'id_complexion';

    protected $table = 'catalogo_complexion';

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(FichaRegistro::class, 'id_complexion');
    // }
}
