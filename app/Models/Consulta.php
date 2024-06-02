<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Consulta.
 *
 * Representa uma consulta médica no sistema, associando pacientes e médicos,
 * e armazenando informações relevantes como data, hora, status e observações da consulta.
 */

class Consulta extends Model
{
    use HasFactory;
    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<string>
     */

    protected $fillable = ['paciente_id', 'medico_id', 'data_hora', 'status', 'observacoes'];

    /**
     * Relacionamento entre consulta e paciente.
     *
     * Cada consulta pertence a um paciente específico.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo Relacionamento inverso de um para muitos.
     */

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

     /**
     * Relacionamento entre consulta e médico.
     *
     * Cada consulta pertence a um médico específico.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo Relacionamento inverso de um para muitos.
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
