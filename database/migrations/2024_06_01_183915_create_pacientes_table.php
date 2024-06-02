<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Criação da tabela 'pacientes' no banco de dados.
 *
 * Esta migration cria a tabela 'pacientes', projetada para armazenar informações detalhadas
 * sobre os pacientes, incluindo dados pessoais como nome, CPF, detalhes de contato como email e telefone,
 * além de informações de endereço.
 */
class CreatePacientesTable extends Migration
{
    /**
     * Executa as migrações.
     *
     * Define a estrutura da tabela 'pacientes' com as seguintes colunas:
     * - 'id' como chave primária autoincrementada.
     * - 'nome' para o nome do paciente.
     * - 'cpf' como um campo único para o Cadastro de Pessoas Físicas.
     * - 'data_cadastro' para registrar a data e hora do cadastro do paciente.
     * - 'telefone' para o número de telefone do paciente.
     * - 'email' como um campo único para o endereço de email do paciente.
     * - 'cep' para o Código de Endereçamento Postal do paciente.
     * - 'endereco' para a rua ou localidade do paciente.
     * - 'numero' para o número da residência ou local de moradia do paciente.
     * - Timestamps padrão ('created_at' e 'updated_at') para rastrear a criação e a última atualização do registro.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf')->unique();
            $table->dateTime('data_cadastro');
            $table->string('telefone');
            $table->string('email')->unique();
            $table->string('cep');
            $table->string('endereco');
            $table->integer('numero');
            $table->timestamps();
        });
    }

    /**
     * Reverte as migrações.
     *
     * Remove a tabela 'pacientes' do banco de dados. Este método é chamado quando a migration é revertida,
     * garantindo que a tabela e seus dados sejam eliminados para evitar inconsistências no banco de dados.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
