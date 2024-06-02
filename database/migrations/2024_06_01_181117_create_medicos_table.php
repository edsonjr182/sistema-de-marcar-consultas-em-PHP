<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Criação da tabela 'medicos' no banco de dados.
 *
 * Esta migration estabelece a tabela 'medicos', que armazena informações sobre os médicos,
 * incluindo nome, CRM (único), e uma chave estrangeira que liga cada médico a uma especialidade médica.
 * As especialidades são gerenciadas separadamente na tabela 'especialidades'.
 */
class CreateMedicosTable extends Migration
{
    /**
     * Executa as migrações.
     *
     * Define a estrutura da tabela 'medicos' incluindo:
     * - 'id' como chave primária autoincrementada.
     * - 'nome' para o nome do médico.
     * - 'crm' para o Cadastro Regional de Médicos, marcado como único.
     * - 'especialidade_id' como chave estrangeira, vinculando cada médico a uma especialidade.
     * - Timestamps para 'created_at' e 'updated_at'.
     * 
     * A relação com 'especialidades' garante que, ao deletar uma especialidade,
     * todos os médicos relacionados também sejam deletados (onDelete('cascade')).
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('crm')->unique();
            $table->unsignedBigInteger('especialidade_id');
            $table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverte as migrações.
     *
     * Remove a tabela 'medicos' do banco de dados. Isso é útil durante o desenvolvimento
     * ou em situações onde a estrutura de dados precisa ser ajustada sem deixar vestígios
     * de versões anteriores.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
