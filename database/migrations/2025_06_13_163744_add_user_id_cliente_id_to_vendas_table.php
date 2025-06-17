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
        Schema::table('vendas', function (Blueprint $table) {
            $table->foreignId('vendedor')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('cliente')->nullable()->references('id')->on('clientes')->onDelete('cascade');    

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendas', function (Blueprint $table) {
            Schema::dropIfExists('vendedor')->references('id')->on('users')->onDelete('cascade');
            Schema::dropIfExists('cliente')->references('id')->on('clientes')->onDelete('cascade');

            
        });
    }
};
