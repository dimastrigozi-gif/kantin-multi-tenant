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
        Schema::create('inventory_stocks', function (Blueprint $table) {
            $table->id();
            
            // Menghubungkan stok ini milik tenant siapa
            $table->foreignId('tenant_id')->constrained()->restrictOnDelete();
            
            // Nama barang atau bahan baku
            $table->string('item_name', 120);
            
            // Jumlah stok saat ini
            $table->integer('quantity')->default(0);
            
            // Satuan unit (misal: porsi, pcs, kg, botol)
            $table->string('unit', 30)->default('pcs');
            
            // Batas minimum stok sebelum peringatan habis muncul
            $table->integer('minimum_stock')->default(5);
            
            // Presisi timestamp sampai mikrodetik
            $table->timestamps(6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_stocks');
    }
};