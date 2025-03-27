<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoOjo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tipo_ojos';

    protected $table = 'catalogo_ojos';

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(FichaRegistro::class, 'id_tipo_ojos');
    // }
}
