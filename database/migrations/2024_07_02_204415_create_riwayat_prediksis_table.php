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
        Schema::create('riwayat_prediksis', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->enum('hasil_prediksi', ['Bullying', 'Non-Bullying']);
            $table->timestamp('predicted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_prediksis');
    }
};
