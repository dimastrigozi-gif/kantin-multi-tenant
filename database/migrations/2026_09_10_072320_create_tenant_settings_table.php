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
        Schema::create('tenant_settings', function (Blueprint $table) {
            $table->id();
            
            // Menghubungkan pengaturan ini milik tenant siapa
            $table->foreignId('tenant_id')->constrained()->restrictOnDelete();
            
            // Kunci pengaturan (contoh: 'is_open', 'opening_hour', 'closing_hour')
            $table->string('key', 100);
            
            // Nilai dari pengaturan tersebut (disimpan fleksibel pakai text/json)
            $table->text('value')->nullable();
            
            // Presisi timestamp sampai mikrodetik
            $table->timestamps(6);
            
            // Membuat kombinasi tenant_id dan key harus unik, biar gak ada settingan kembar
            $table->unique(['tenant_id', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_settings');
    }
};
