<?php

namespace App\Http\Controllers;

// Importações de modelos do Laravel

use Illuminate\Http\Request;
use App\Models\Especialidade;  // Modelo para gerenciar especialidades médicas
use App\Models\Medico;         // Modelo para gerenciar informações de médicos
use App\Models\Consulta;       // Modelo para gerenciar dados de consultas médicas
use App\Models\Paciente;       // Modelo para gerenciar informações de pacientes



/**
 * Classe controladora que gerencia as operações relacionadas a consultas médicas.
 *
 * Esta classe é responsável por manipular todas as operações CRUD para as consultas médicas,
 * incluindo a listagem de consultas, criação, atualização e remoção de consultas, bem como
 * a visualização de detalhes de consultas individuais. Ela utiliza modelos para interagir
 * com a base de dados e retornar dados necessários para as views.
 */

class ConsultaController extends Controller
{
    /**
 * Retorna uma listagem das consultas.
 *
 * Este método recupera todas as consultas, incluindo os dados associados de pacientes e médicos,
 * e retorna uma view com esses dados.
 *
 * @return \Illuminate\Http\Response Retorna a view com as consultas listadas.
 */
    public function index()
{
    $consultas = Consulta::with(['paciente', 'medico'])->get();
    return view('consultas.index', compact('consultas'));
}


 /**
 * Exibe o formulário para a criação de uma nova consulta.
 *
 * Este método recupera todos os pacientes e médicos disponíveis e passa esses dados para a view,
 * permitindo que o usuário insira os dados necessários para agendar uma nova consulta.
 *
 * @return \Illuminate\Http\Response Retorna a view para criar uma nova consulta.
 */
public function create()
{
    $pacientes = Paciente::all();  // Assume que você tem um modelo Paciente
    $medicos = Medico::all();  // Assume que você tem um modelo Medico
    return view('consultas.create', compact('pacientes', 'medicos'));
}


/**
 * Armazena uma nova consulta no banco de dados.
 *
 * Este método valida e salva uma nova consulta no banco de dados após verificar se o paciente,
 * se for menor de 12 anos, está sendo atendido por um pediatra. Redireciona para a listagem de consultas
 * com uma mensagem de sucesso ou retorna erro se não cumprir as condições necessárias.
 *
 * @param  \Illuminate\Http\Request  $request Dados da nova consulta a ser criada.
 * @return \Illuminate\Http\RedirectResponse Redireciona para a listagem de consultas com uma mensagem de sucesso ou retorna erro.
 */
public function store(Request $request)
{
    $paciente = Paciente::findOrFail($request->paciente_id);
    $medico = Medico::findOrFail($request->medico_id);

    // Calculando a idade do paciente a partir da data de cadastro
    $idade = now()->diffInYears($paciente->data_cadastro);

    // Verificando se o paciente tem menos de 12 anos e se o médico não é pediatra
    if ($idade < 12) {
        if ($medico->especialidade->nome !== 'Pediatria') {
            return back()->withErrors(['error' => 'Pacientes com menos de 12 anos só podem ser atendidos por médicos da especialidade de Pediatria.']);
        }
    }

    // Se a validação passar, prossegue com a criação da consulta
    Consulta::create([
        
        'paciente_id' => $request->paciente_id,
        'medico_id' => $request->medico_id,
        'data_hora' => $request->data_hora,
    ]);

    return redirect()->route('consultas.index')->with('success', 'Consulta agendada com sucesso!');
}



 /**
 * Exibe os detalhes de uma consulta específica.
 *
 * Este método busca uma consulta específica pelo ID, incluindo os dados associados do paciente e médico,
 * e retorna uma view com esses detalhes.
 *
 * @param  int  $id O ID da consulta a ser exibida.
 * @return \Illuminate\Http\Response Retorna a view com os detalhes da consulta.
 */
public function show($id)
{
    $consulta = Consulta::with(['paciente', 'medico'])->findOrFail($id);
    return view('consultas.show', compact('consulta'));
}


/**
 * Exibe o formulário para editar uma consulta existente.
 *
 * Este método busca uma consulta específica pelo ID, juntamente com todos os pacientes e médicos disponíveis,
 * e retorna uma view para editar os dados da consulta.
 *
 * @param  int  $id O ID da consulta a ser editada.
 * @return \Illuminate\Http\Response Retorna a view para editar a consulta.
 */
public function edit($id)
{
    $consulta = Consulta::findOrFail($id);
    $pacientes = Paciente::all();
    $medicos = Medico::all();
    return view('consultas.edit', compact('consulta', 'pacientes', 'medicos'));
}


/**
 * Atualiza uma consulta existente no banco de dados.
 *
 * Este método valida e atualiza os dados de uma consulta existente com base no ID fornecido.
 * Redireciona para a listagem de consultas com uma mensagem de sucesso.
 *
 * @param  \Illuminate\Http\Request  $request Os novos dados para atualizar a consulta.
 * @param  int  $id O ID da consulta a ser atualizada.
 * @return \Illuminate\Http\RedirectResponse Redireciona para a listagem de consultas com uma mensagem de sucesso.
 */
public function update(Request $request, $id)
{
    $request->validate([
        'paciente_id' => 'required|exists:pacientes,id',
        'medico_id' => 'required|exists:medicos,id',
        'data_hora' => 'required|date',
        'status' => 'required|string',
        'observacoes' => 'nullable|string'
    ]);

    $consulta = Consulta::findOrFail($id);
    $consulta->update($request->all());

    return redirect()->route('consultas.index')->with('success', 'Consulta atualizada com sucesso!');
}


/**
 * Remove uma consulta do banco de dados.
 *
 * Este método deleta uma consulta específica pelo ID e redireciona para a listagem de consultas
 * com uma mensagem de sucesso.
 *
 * @param  int  $id O ID da consulta a ser excluída.
 * @return \Illuminate\Http\RedirectResponse Redireciona para a listagem de consultas com uma mensagem de sucesso.
 */
public function destroy($id)
{
    $consulta = Consulta::findOrFail($id);
    $consulta->delete();

    return redirect()->route('consultas.index')->with('success', 'Consulta excluída com sucesso!');
}

}
