<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;  // Modelo para gerenciar especialidades médicas.

/**
 * Controlador responsável por gerenciar as operações de CRUD para especialidades médicas.
 */

class EspecialidadeController extends Controller
{
  /**
     * Exibe uma lista de todas as especialidades médicas.
     *
     * @return \Illuminate\Http\Response Retorna a view com a listagem das especialidades.
     */
public function index()
{
    
   $especialidades = Especialidade::all();  // Busca todas as especialidades
    return view('especialidades.index', compact('especialidades'));  // Passa as especialidades para a view
}

 /**
     * Exibe o formulário para criar uma nova especialidade médica.
     *
     * @return \Illuminate\View\View Retorna a view para criar uma nova especialidade.
     */
public function create()
{
    return view('especialidades.create');
}

 /**
     * Armazena uma nova especialidade no banco de dados.
     *
     * @param \Illuminate\Http\Request $request Dados da nova especialidade.
     * @return \Illuminate\Http\RedirectResponse Redireciona para a lista de especialidades com uma mensagem de sucesso.
     */
public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
    ]);

    Especialidade::create($request->all());

    return redirect()->route('especialidades.index')->with('success', 'Especialidade criada com sucesso!');
}

  /**
     * Exibe os detalhes de uma especialidade específica.
     *
     * @param int $id Identificador da especialidade.
     * @return \Illuminate\View\View Retorna a view com os detalhes da especialidade.
     */
public function show($id)
{
    $especialidade = Especialidade::findOrFail($id);
    return view('especialidades.show', compact('especialidade'));
}

/**
     * Exibe o formulário para editar uma especialidade existente.
     *
     * @param int $id Identificador da especialidade a ser editada.
     * @return \Illuminate\View\View Retorna a view para editar a especialidade.
     */
public function edit($id)
{
    $especialidade = Especialidade::findOrFail($id);
    return view('especialidades.edit', compact('especialidade'));
}


  /**
     * Atualiza os dados de uma especialidade no banco de dados.
     *
     * @param \Illuminate\Http\Request $request Dados atualizados da especialidade.
     * @param int $id Identificador da especialidade a ser atualizada.
     * @return \Illuminate\Http\RedirectResponse Redireciona para a lista de especialidades com uma mensagem de sucesso.
     */
public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required|string|max:255',
    ]);

    $especialidade = Especialidade::findOrFail($id);
    $especialidade->update($request->all());

    return redirect()->route('especialidades.index')->with('success', 'Especialidade atualizada com sucesso!');
}

  /**
     * Remove uma especialidade do banco de dados.
     *
     * @param int $id Identificador da especialidade a ser removida.
     * @return \Illuminate\Http\RedirectResponse Redireciona para a lista de especialidades com uma mensagem de sucesso.
     */
public function destroy($id)
{
    $especialidade = Especialidade::findOrFail($id);
    $especialidade->delete();

    return redirect()->route('especialidades.index')->with('success', 'Especialidade deletada com sucesso!');
}



}
