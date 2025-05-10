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
        Schema::create('stock_transaction', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['masuk', 'keluar']);
            $table->bigInteger('quantity');
            $table->date('date');
            $table->enum('status', ['pending', 'diterima', 'ditolak', 'dikeluarkan'])->default('pending');
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_transaction');
    }
};
