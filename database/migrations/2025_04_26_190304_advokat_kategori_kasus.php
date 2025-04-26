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
        Schema::create('advokat_kategori_kasus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advokat_id')->constrained('pengacara')->onDelete('cascade');
            $table->foreignId('kategori_kasus_id')->constrained('kategori_kasus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
