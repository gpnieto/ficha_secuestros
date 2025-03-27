<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoMenton extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tipo_menton';

    protected $table = 'catalogo_menton';

    protected $fillable = [
           'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(fichaRegistro::class, 'id_tipo_menton');
    // }
}
