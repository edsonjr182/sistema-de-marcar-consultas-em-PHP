<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo para médicos.
 *
 * Este modelo representa um médico dentro do sistema, contendo informações como nome,
 * CRM (Cadastro Regional de Médicos), e a especialidade associada.
 *
 * @property int $id Identificador único do médico.
 * @property string $nome Nome do médico.
 * @property string $crm Cadastro Regional de Médicos.
 * @property int $especialidade_id Identificador da especialidade associada ao médico.
 */

class Medico extends Model
{

 /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * Define quais colunas podem ser preenchidas diretamente, facilitando a criação e atualização
     * de registros do médico através de arrays de dados.
     *
     * @var array<string>
     */

    protected $fillable = ['nome', 'crm', 'especialidade_id'];

    /**
     * Obtém a especialidade associada ao médico.
     *
     * Este método define um relacionamento "pertence a" (belongsTo) entre o médico e sua especialidade.
     * Cada médico está associado a uma especialidade específica.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }
}
