<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoCeja extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tipo_cejas';

    protected $table = 'catalogo_cejas';

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(FichaRegistlro::class, 'id_tipo_cejas');
    // }
}
