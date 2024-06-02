<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo para pacientes.
 *
 * Este modelo representa um paciente dentro do sistema, contendo informações pessoais
 * e de contato, além de detalhes do cadastro como endereço e data de cadastro.
 *
 * @property int $id Identificador único do paciente.
 * @property string $nome Nome do paciente.
 * @property string $cpf CPF do paciente.
 * @property string $email E-mail do paciente.
 * @property string $telefone Telefone do paciente.
 * @property string $cep CEP do paciente.
 * @property string $endereco Endereço do paciente.
 * @property int $numero Número da residência do paciente.
 * @property \Illuminate\Support\Carbon $data_cadastro Data de cadastro do paciente.
 */

class Paciente extends Model
{

/**
     * Os atributos que podem ser atribuídos em massa.
     *
     * Define quais campos podem ser preenchidos diretamente no processo de criação ou atualização
     * de registros, facilitando operações de CRUD.
     *
     * @var array<string>
     */
    protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'cep', 'endereco', 'numero', 'data_cadastro'];
}
