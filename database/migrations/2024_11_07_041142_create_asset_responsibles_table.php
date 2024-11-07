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
        Schema::create('asset_responsibles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id'); // Foreign key to departments
            $table->string('name');
            $table->string('position'); // Jabatan penanggung jawab
            $table->string('contact_info'); // Informasi kontak penanggung jawab
            $table->timestamps();

            // Relasi ke tabel departments
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_responsibles');
    }
};
