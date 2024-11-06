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
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id')->nullable(); // Kolom untuk foreign key
            $table->integer('quantity');
            $table->string('unit'); // Satuan seperti "pcs", "liters", dll
            $table->date('last_restocked')->nullable();
            $table->timestamps();
        });

        // Tambahkan foreign key hanya jika tabel 'inventory_categories' sudah ada
        if (Schema::hasTable('inventory_categories')) {
            Schema::table('inventory_items', function (Blueprint $table) {
                $table->foreign('category_id')->references('id')->on('inventory_categories')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus foreign key hanya jika ada
        Schema::table('inventory_items', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        // Hapus tabel
        Schema::dropIfExists('inventory_items');
    }
};
