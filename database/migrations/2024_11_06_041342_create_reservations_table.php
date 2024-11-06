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
        Schema::create('reservations', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('room_id');
            $table->date('check_in');
            $table->date('check_out');
            $table->timestamps();

            // Tambahkan foreign key jika tabel 'guests' dan 'rooms' ada
            if (Schema::hasTable('guests')) {
                $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
            }

            if (Schema::hasTable('rooms')) {
                $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
