<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('fichas_registro', function (Blueprint $table) {
            $table->string('curp')->nullable()->default('SIN DATO');
        });
    }

    public function down(): void {
        Schema::table('fichas_registro', function (Blueprint $table) {
            $table->dropColumn('curp');
        });
    }
};
