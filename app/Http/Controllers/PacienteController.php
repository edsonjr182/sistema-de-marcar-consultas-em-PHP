<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;  // Modelo para gerenciar os dados dos pacientes.
use App\Rules\ValidateCPF;  // Regra de validação personalizada para CPF.

/**
 * Controlador responsável pela gestão dos pacientes.
 *
 * Este controlador gerencia todas as operações CRUD para pacientes, manipulando dados
 * como nome, CPF, endereço e informações de contato. Ele utiliza métodos padrões do
 * Laravel para exibir, criar, editar, atualizar e deletar pacientes, além de 
 * garantir que as entradas sejam validadas adequadamente antes de serem armazenadas.
 */


class PacienteController extends Controller
{
   /**
    * Lista todos os pacientes cadastrados.
    *
    * @return \Illuminate\Http\Response Retorna a view com a lista de pacientes.
    */
    public function index()
{
    $pacientes = Paciente::all();  // Busca todos os pacientes
    return view('pacientes.index', compact('pacientes'));  // Passa os pacientes para a view
}


    /**
     * Exibe o formulário para cadastro de um novo paciente.
    *
    * @return \Illuminate\Http\Response Retorna a view do formulário de cadastro de pacientes.
    */
    public function create()
    {
            return view('pacientes.create');

    }

    /**
    * Armazena um paciente recém-criado no banco de dados.
    *
    * Valida e salva os dados do novo paciente. Redireciona para a lista de pacientes com uma mensagem de sucesso.
    *
    * @param  \Illuminate\Http\Request  $request Dados do novo paciente.
    * @return \Illuminate\Http\Response Redireciona para a lista de pacientes.
    */
    public function store(Request $request)
    {
            \Log::info('Request data:', $request->all());

      $validatedData = $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => ['required', 'string', 'max:14', new ValidateCPF, 'unique:pacientes,cpf'],
        'email' => 'required|string|email|max:255|unique:pacientes,email',
        'telefone' => 'required|string',
        'cep' => 'required|string|size:8',
        'endereco' => 'required|string|max:255',
        'numero' => 'required|integer',
        'data_cadastro' => 'required|date',
        'responsavel_nome' => 'nullable|required_if:idade,lt,18|string',
        'responsavel_cpf' => 'nullable|required_if:idade,lt,18|string',
        ]);
        $idade = now()->diffInYears($request->data_cadastro);
        $request->request->add(['idade' => $idade]);
        Paciente::create($validatedData);
    

        return redirect()->route('pacientes.index')->with('success', 'Paciente criado com sucesso!');

      }

   
    /**
    * Exibe o formulário para edição de um paciente existente.
    *
    * @param  int  $id Identificador do paciente a ser editado.
    * @return \Illuminate\Http\Response Retorna a view do formulário de edição com os dados do paciente.
    */
    public function edit($id)
    {
         $paciente = Paciente::findOrFail($id);
    return view('pacientes.edit', compact('paciente'));
    }

    /**
    * Atualiza os dados de um paciente no banco de dados.
    *
    * Valida e atualiza os dados do paciente com base no ID fornecido. Redireciona para a lista de pacientes com uma mensagem de sucesso.
    *
    * @param  \Illuminate\Http\Request  $request Dados atualizados do paciente.
    * @param  int  $id Identificador do paciente a ser atualizado.
    * @return \Illuminate\Http\Response Redireciona para a lista de pacientes.
    */
    public function update(Request $request, $id)
    {
         $validatedData = $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => ['required', 'string', 'max:14', new ValidateCPF, 'unique:pacientes,cpf,'.$id],
        'email' => 'required|string|email|max:255|unique:pacientes,email,' . $id,
        'telefone' => 'required|string',
        'cep' => 'required|string|size:8',
        'endereco' => 'required|string|max:255',
        'numero' => 'required|integer',
        'data_cadastro' => 'required|date'
        ]);
        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente atualizado com sucesso!');

    }

    /**
    * Exclui um paciente do banco de dados.
    *
    * Remove o paciente com base no ID fornecido. Redireciona para a lista de pacientes com uma mensagem de sucesso.
    *
    * @param  int  $id Identificador do paciente a ser removido.
    * @return \Illuminate\Http\Response Redireciona para a lista de pacientes.
    */
    public function destroy($id)
    {
            $paciente = Paciente::findOrFail($id);
    $paciente->delete();

    return redirect()->route('pacientes.index')->with('success', 'Paciente deletado com sucesso!');

    }

     /**
     * Exibe detalhes de um paciente específico.
    *
    * @param  int  $id Identificador do paciente a ser visualizado.
    * @return \Illuminate\View\View Retorna a view com detalhes do paciente específico.
    */
    public function show($id)
    {
    $paciente = Paciente::findOrFail($id);
    return view('pacientes.show', compact('paciente'));
    }
}
