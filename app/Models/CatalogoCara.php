<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoCara extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tipo_cara';
    protected $table = 'catalogo_cara';

    protected $fillable = [
        'descripcion',
    ];

    // public function fichaRegistro() {
    //     return $this->hasMany(fichaRegistro::class, 'id_tipo_cara');
    // }
}
