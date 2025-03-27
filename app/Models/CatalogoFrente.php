<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoFrente extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tipo_frente';

    protected $table = ('catalogo_frente');

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(FichaRegisro::class, 'id_tipo_frente');
    // }
}
