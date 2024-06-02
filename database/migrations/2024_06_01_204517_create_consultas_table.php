<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Criação da tabela 'consultas' no banco de dados.
 *
 * Esta migration define a tabela 'consultas', que armazena informações sobre as consultas médicas,
 * vinculando pacientes e médicos, e registrando detalhes como data e hora, status e observações da consulta.
 */
class CreateConsultasTable extends Migration
{
    /**
     * Executa as migrações.
     *
     * Define a estrutura da tabela 'consultas' com as seguintes colunas:
     * - 'id' como chave primária autoincrementada.
     * - 'paciente_id' e 'medico_id' como chaves estrangeiras que referenciam as tabelas de pacientes e médicos, respectivamente.
     * - 'data_hora' para registrar a data e hora da consulta.
     * - 'status' com um valor padrão 'agendada', que pode ser alterado para 'realizada' ou 'cancelada'.
     * - 'observacoes' como um campo opcional para quaisquer notas adicionais sobre a consulta.
     * - Timestamps para 'created_at' e 'updated_at'.
     *
     * As chaves estrangeiras têm uma política de exclusão em cascata, o que significa que ao deletar um paciente ou médico,
     * todas as suas consultas relacionadas serão automaticamente deletadas.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('medico_id');
            $table->dateTime('data_hora');
            $table->string('status')->default('agendada');// Exemplos de status: agendada, realizada, cancelada
            $table->text('observacoes')->nullable();
            $table->timestamps();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
        });
    }

    /**
     * Reverte as migrações.
     *
     * Remove a tabela 'consultas' do banco de dados. Este método é utilizado quando a migration é revertida,
     * garantindo que a tabela e seus dados sejam completamente eliminados para evitar qualquer inconsistência no banco de dados.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
