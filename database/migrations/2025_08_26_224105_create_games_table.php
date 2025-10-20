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
    Schema::create('games', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->text('descricao');
        $table->decimal('classificacao_acessibilidade', 2, 1); // de 0.0 a 5.0
        $table->string('descricao_acessibilidade'); // pode ser tags separadas por vírgula
        $table->timestamps();
        
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
