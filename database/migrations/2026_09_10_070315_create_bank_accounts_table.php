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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            // Menghubungkan rekening bank ini milik tenant mana (Foreign Key)
            $table->foreignId('tenant_id')->constrained()->restrictOnDelete();
            
            // Nama bank, contoh: BCA, Mandiri, BNI
            $table->string('bank_name', 50);
            
            // Nomor rekening disimpan sebagai string karena bisa jadi ada angka 0 di depan
            $table->string('account_number', 50);
            
            // Nama pemilik rekening sesuai yang tertera di buku tabungan/m-banking
            $table->string('account_holder_name', 120);
            
            // Menandai apakah rekening ini yang utama dipakai atau tidak
            $table->boolean('is_primary')->default(false);
            
            // Presisi timestamp sampai tingkat mikrodetik untuk mencatat waktu persis
            $table->timestamps(6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};