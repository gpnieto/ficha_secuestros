<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoTez extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tez';

    protected $table = 'catalogo_tez';

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(FichaRegistro::class, 'id_tez');
    // }
}
