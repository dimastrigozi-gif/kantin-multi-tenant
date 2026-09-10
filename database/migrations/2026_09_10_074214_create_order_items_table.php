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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            // Tenant yang memiliki item pesanan ini
            $table->foreignId('tenant_id')
                ->constrained()
                ->restrictOnDelete();

            // Menu yang dipesan
            $table->unsignedBigInteger('menu_id');

            // Foreign key komposit:
            // menu yang dipilih harus berasal dari tenant yang sama
            $table->foreign(['tenant_id', 'menu_id'])
                ->references(['tenant_id', 'id'])
                ->on('menus')
                ->restrictOnDelete();

            // Jumlah menu yang dipesan
            $table->unsignedInteger('quantity')->default(1);

            // Harga menu saat transaksi
            $table->unsignedBigInteger('unit_price');

            // Timestamp presisi mikrodetik
            $table->timestamps(6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};