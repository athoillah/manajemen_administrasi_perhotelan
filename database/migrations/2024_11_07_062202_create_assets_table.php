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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id'); // Foreign key to asset_categories
            $table->string('name');
            $table->string('serial_number')->unique()->nullable();
            $table->decimal('value', 12, 2)->nullable(); // Nilai aset
            $table->date('purchase_date')->nullable();
            $table->string('condition')->nullable(); // Kondisi aset
            $table->timestamps();

            // Definisikan foreign key ke tabel asset_categories
            $table->foreign('category_id')->references('id')->on('asset_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
