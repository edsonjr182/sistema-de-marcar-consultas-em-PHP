<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Criação da tabela 'especialidades' no banco de dados.
 *
 * Esta migration cria a tabela 'especialidades' destinada a armazenar informações sobre
 * as diferentes especialidades médicas disponíveis no sistema. Cada especialidade é identificada
 * por um nome único.
 */
class CreateEspecialidadesTable extends Migration
{
    /**
     * Executa as migrações.
     *
     * Aqui é definida a estrutura da tabela 'especialidades', incluindo:
     * - 'id' como chave primária autoincrementada
     * - 'nome' para armazenar o nome da especialidade médica
     * - Timestamps para 'created_at' e 'updated_at'
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });
    }

    /**
     * Reverte as migrações.
     *
     * Remove a tabela 'especialidades' do banco de dados caso seja necessário reverter a migration.
     * Este método é útil durante o desenvolvimento ou em situações onde a estrutura de dados precisa ser ajustada.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidades');
    }
}
