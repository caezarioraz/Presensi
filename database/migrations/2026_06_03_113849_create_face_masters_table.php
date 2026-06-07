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
        Schema::create('face_masters', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mahasiswa_id');

            $table->string('foto');

            $table->longText('encoding')->nullable();

            $table->timestamp('tanggal_registrasi')
                ->useCurrent();

            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('face_masters');
    }
};
