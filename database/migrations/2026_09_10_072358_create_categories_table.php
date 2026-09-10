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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Menghubungkan kategori dengan tenant pemiliknya
            $table->foreignId('tenant_id')->constrained()->restrictOnDelete();

            // Nama kategori, contoh: Makanan, Minuman, Snack
            $table->string('name', 100);

            // Slug untuk URL atau identitas kategori
            $table->string('slug', 100);

            // Menentukan apakah kategori sedang aktif
            $table->boolean('is_active')->default(true);

            // Presisi timestamp sampai mikrodetik
            $table->timestamps(6);

            // Dalam satu tenant, slug kategori tidak boleh kembar
            $table->unique(['tenant_id', 'slug']);

            // Dibutuhkan untuk foreign key komposit pada tabel child
            $table->unique(['tenant_id', 'id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};