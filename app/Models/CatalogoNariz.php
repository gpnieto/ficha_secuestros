<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoNariz extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tipo_nariz';

    protected $table = 'catalogo_nariz';

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(FichaRegistro::class, 'id_tipo_nariz');
    // }
}
