<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('catalogo_cara', function (Blueprint $table) {
            $table->id('id_tipo_cara');
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
        Schema::dropIfExists('catalogo_cara');
    }
};
