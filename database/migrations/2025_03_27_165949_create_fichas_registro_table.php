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
        Schema::create('fichas_registro', function (Blueprint $table) {
            $table->id();
            $table->string('nuc')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('nombre')->nullable();
            $table->date('fecha_secuestro')->nullable();
            $table->string('lugar_secuestro')->nullable();

            $table->foreignId('catalogo_sexo_id')
                ->nullable()
                ->constrained('catalogo_sexo', 'id_sexo');

            $table->string('edad')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('complexion')->nullable();
            $table->string('tez')->nullable();
            $table->string('estatura')->nullable();
            $table->string('descripcion_cabello')->nullable();
            $table->string('descripcion_frente')->nullable();
            $table->string('descripcion_cejas')->nullable();
            $table->string('descripcion_ojos')->nullable();
            $table->string('descripcion_nariz')->nullable();
            $table->string('descripcion_boca')->nullable();
            $table->string('descripcion_orejas')->nullable();
            $table->string('descripcion_labios')->nullable();
            $table->string('descripcion_menton')->nullable();
            $table->string('descripcion_cara')->nullable();
            $table->boolean('barba_bigote')->nullable()->default(false);
            $table->string('señas_particulares')->nullable();
            $table->string('ropa')->nullable();
            $table->string('fotografia')->default('default.jpg');
            $table->softDeletes()
                  ->comment('En caso de eliminacion solo se eliminara de manera logica');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas_registro');
    }
};
