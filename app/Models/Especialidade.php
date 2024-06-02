<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo para as especialidades médicas.
 * Representa as diversas especialidades médicas dentro do sistema, como Cardiologia, Dermatologia, etc.
 *
 * @property int $id Identificador único da especialidade.
 * @property string $nome Nome da especialidade médica.
 * @property \Illuminate\Support\Carbon|null $created_at Data e hora da criação do registro.
 * @property \Illuminate\Support\Carbon|null $updated_at Data e hora da última atualização do registro.
 */
class Especialidade extends Model
{

 /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * Este array define quais atributos podem ser preenchidos diretamente,
     * facilitando operações de criação e atualização de registros.
     *
     * @var array<string>
     */
    protected $fillable = ['nome'];
}
