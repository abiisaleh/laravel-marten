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
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->string('nama',50);
            $table->text('alamat');
            $table->string('kelurahan',50);
            $table->string('kecamatan',50);
            $table->integer('k_suasana')->nullable();
            $table->integer('k_variasi_menu')->nullable();
            $table->integer('k_fasilitas')->nullable();
            $table->integer('k_pelayanan')->nullable();
            $table->integer('k_lokasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cafes');
    }
};
