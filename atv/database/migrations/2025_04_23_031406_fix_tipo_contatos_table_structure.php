<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tipo_contatos', function (Blueprint $table) {
            // Adicione campos faltantes
            if (!Schema::hasColumn('tipo_contatos', 'nome')) {
                $table->string('nome', 80);
            }
            
            if (!Schema::hasColumn('tipo_contatos', 'descricao')) {
                $table->text('descricao')->nullable();
            }
            
            // Remova campos não utilizados
            if (Schema::hasColumn('tipo_contatos', 'home')) {
                $table->dropColumn('home');
            }
            
            if (Schema::hasColumn('tipo_contatos', 'tipo_contato')) {
                $table->dropColumn('tipo_contato');
            }
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
