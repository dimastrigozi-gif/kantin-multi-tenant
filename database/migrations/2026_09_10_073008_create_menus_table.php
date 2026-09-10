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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            // Menentukan menu ini milik tenant yang mana
            $table->foreignId('tenant_id')->constrained()->restrictOnDelete();

            // Nama menu makanan atau minuman
            $table->string('name', 120);

            // Harga menu dalam satuan Rupiah
            $table->unsignedBigInteger('price_amount');

            // Menentukan apakah menu sedang tersedia
            $table->boolean('is_available')->default(true);

            // Timestamp dengan precision mikrodetik
            $table->timestamps(6);

            // Menjaga scope tenant untuk foreign key komposit
            $table->unique(['tenant_id', 'id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};