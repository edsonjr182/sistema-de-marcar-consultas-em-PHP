<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;  // Modelo para gerenciar especialidades médicas.
use App\Models\Medico;         // Modelo para gerenciar médicos.

/**
 * Controlador responsável por gerenciar médicos.
 */
class MedicoController extends Controller
{
   /**
     * Lista todos os médicos com suas especialidades.
     *
     * @return \Illuminate\Http\Response Retorna a view com a listagem de médicos.
     */
    public function index()
{
    $medicos = Medico::with('especialidade')->get();
    return view('medicos.index', compact('medicos'));
}


    /**
     * Exibe o formulário para criar um novo médico.
     *
     * @return \Illuminate\Http\Response Retorna a view para adicionar um novo médico.
     */
    public function create()
    {
           $especialidades = Especialidade::all();
    return view('medicos.create', compact('especialidades'));
    }
   /**
     * Exibe detalhes de um médico específico.
     *
     * @param int $id Identificador do médico.
     * @return \Illuminate\View\View Retorna a view com detalhes do médico.
     */
    public function show($id)
    {
    $medico = Medico::with('especialidade')->findOrFail($id);
    return view('medicos.show', compact('medico'));
    }



   /**
     * Armazena um médico no banco de dados.
     *
     * @param \Illuminate\Http\Request $request Dados do novo médico.
     * @return \Illuminate\Http\RedirectResponse Redireciona após o médico ser salvo.
     */
    public function store(Request $request)
    {
    $request->validate([
        'nome' => 'required|string|max:255',
        'crm' => 'required|string|max:20|unique:medicos',
        'especialidade_id' => 'required|exists:especialidades,id'
    ]);

    Medico::create($request->all());

    return redirect()->route('medicos.index')->with('success', 'Médico criado com sucesso!');
    }


    /**
     * Exibe o formulário para editar um médico.
     *
     * @param int $id Identificador do médico a ser editado.
     * @return \Illuminate\Http\Response Retorna a view para editar o médico.
     */
    public function edit($id)
    {
    $medico = Medico::findOrFail($id);
    $especialidades = Especialidade::all();
    return view('medicos.edit', compact('medico', 'especialidades'));
    }

   /**
     * Atualiza os dados de um médico no banco de dados.
     *
     * @param \Illuminate\Http\Request $request Dados atualizados do médico.
     * @param int $id Identificador do médico.
     * @return \Illuminate\Http\RedirectResponse Redireciona após o médico ser atualizado.
     */
    public function update(Request $request, $id)
    {
    $request->validate([
        'nome' => 'required|string|max:255',
        'crm' => 'required|string|max:20|unique:medicos,crm,' . $id,
        'especialidade_id' => 'required|exists:especialidades,id'
    ]);

    $medico = Medico::findOrFail($id);
    $medico->update($request->all());

    return redirect()->route('medicos.index')->with('success', 'Médico atualizado com sucesso!');
    }

    /**
     * Remove um médico do banco de dados.
     *
     * @param int $id Identificador do médico a ser removido.
     * @return \Illuminate\Http\RedirectResponse Redireciona após o médico ser deletado.
     */
    public function destroy($id)
    {
    $medico = Medico::findOrFail($id);
    $medico->delete();

    return redirect()->route('medicos.index')->with('success', 'Médico deletado com sucesso!');
    }

}
