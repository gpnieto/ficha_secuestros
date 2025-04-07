<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatalogoSexo extends Model {
    use SoftDeletes;
    protected $primaryKey = 'id_sexo';

    protected $table = 'catalogo_sexo';

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(FichaRegistro::class, 'id_sexo');
    // }
}
