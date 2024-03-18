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
        Schema::create('filedekelas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tahun_id');
            $table->uuid('desa_id');
            $table->uuid('dekela_id');
            $table->string('file');
            $table->integer('status');
            $table->string('ket')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filedekelas');
    }
};
