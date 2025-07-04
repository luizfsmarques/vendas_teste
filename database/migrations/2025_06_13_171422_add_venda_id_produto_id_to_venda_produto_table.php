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
        Schema::table('venda_produto', function (Blueprint $table) {
            $table->foreignId('venda')->references('id')->on('vendas')->onDelete('cascade');
            $table->foreignId('produto')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venda_produto', function (Blueprint $table) {
            Schema::dropIfExists('venda')->references('id')->on('vendas')->onDelete('cascade');
            Schema::dropIfExists('produto')->references('id')->on('produtos')->onDelete('cascade');
        });
    }
};
