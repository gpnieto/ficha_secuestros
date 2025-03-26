<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('catalogo_boca', function (Blueprint $table) {
            $table->id('id_tipo_boca');
            $table->string('descripcion')->unique();
            $table->softDeletes()->comment('En caso de eliminación solo se hara de manera logica');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogo_boca');
    }
};
