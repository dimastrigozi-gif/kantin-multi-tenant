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
        Schema::create('payouts', function (Blueprint $table) {
            $table->id();
            
            // Menghubungkan payout ini milik tenant siapa
            $table->foreignId('tenant_id')->constrained()->restrictOnDelete();
            
            // Menghubungkan ke rekening bank tujuan pencairan
            $table->foreignId('bank_account_id')->constrained('bank_accounts')->restrictOnDelete();
            
            // Jumlah nominal dana yang dicairkan
            $table->decimal('amount', 12, 2);
            
            // Status pencairan: pending (tertunda), processing (diproses), success (berhasil), failed (gagal)
            $table->enum('status', ['pending', 'processing', 'success', 'failed'])->default('pending');
            
            // Catatan atau alasan (misal: alasan gagal atau catatan dari admin)
            $table->text('notes')->nullable();
            
            // Presisi timestamp sampai mikrodetik
            $table->timestamps(6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payouts');
    }
};