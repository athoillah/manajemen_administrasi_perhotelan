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
        Schema::create('housekeeping_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id')->nullable(); // Untuk area umum, bisa bernilai null
            $table->date('scheduled_date'); // Tanggal penjadwalan
            $table->enum('area', ['Room', 'Lobby', 'Hallway', 'Bathroom', 'Gym', 'Pool'])->default('Room'); // Area yang dibersihkan
            $table->enum('status', ['Scheduled', 'In Progress', 'Completed'])->default('Scheduled');
            $table->text('notes')->nullable(); // Catatan tambahan
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('set null'); // Referensi ke tabel rooms
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('housekeeping_schedules');
    }
};
