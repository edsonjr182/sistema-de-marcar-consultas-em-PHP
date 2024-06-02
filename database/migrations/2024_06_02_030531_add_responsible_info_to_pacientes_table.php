<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Adiciona informações sobre o responsável aos registros de pacientes na tabela 'pacientes'.
 *
 * Esta migration adiciona duas novas colunas à tabela 'pacientes': 'responsavel_nome' e 'responsavel_cpf',
 * que são usadas para armazenar o nome e o CPF do responsável pelo paciente, respectivamente.
 * Estas colunas são opcionais e destinam-se a pacientes que são menores de idade ou que
 * requerem cuidados especiais, onde um responsável precisa ser registrado.
 */
class AddResponsibleInfoToPacientesTable extends Migration
{
    /**
     * Executa as migrações.
     *
     * Adiciona as colunas 'responsavel_nome' e 'responsavel_cpf' à tabela 'pacientes'.
     * Ambas as colunas são configuradas como nullable, pois podem não ser aplicáveis a todos os pacientes.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->string('responsavel_nome')->nullable();
            $table->string('responsavel_cpf')->nullable();
        });
    }

    /**
     * Reverte as migrações.
     *
     * Remove as colunas 'responsavel_nome' e 'responsavel_cpf' da tabela 'pacientes'.
     * Esta função é utilizada para reverter a migration, garantindo que as alterações
     * possam ser desfeitas de maneira limpa e eficiente.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->dropColumn(['responsavel_nome', 'responsavel_cpf']);
        });
    }
}
