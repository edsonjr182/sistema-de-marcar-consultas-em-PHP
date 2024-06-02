<?php

namespace App\Http\Controllers;
// Importações dos modelos utilizados no controller.
use Illuminate\Http\Request;  // Classe para manipulação de requisições HTTP.
use App\Models\Paciente;      // Modelo para acessar e gerenciar dados de pacientes.
use App\Models\Medico;        // Modelo para acessar e gerenciar dados de médicos.
use App\Models\Consulta;      // Modelo para acessar e gerenciar dados de consultas médicas.
use App\Models\Especialidade; // Modelo para acessar e gerenciar dados das especialidades médicas.

/**
 * Controlador para o Dashboard do sistema.
 *
 * Este controlador é responsável por gerenciar as operações relacionadas ao dashboard principal,
 * incluindo a agregação e exibição de informações e estatísticas gerais, como contagem de pacientes,
 * médicos, consultas e especialidades. O Dashboard oferece uma visão rápida e abrangente do estado
 * atual do sistema, ajudando na tomada de decisões e no monitoramento de indicadores chave.
 */
class DashboardController extends Controller
{
   /**
 * Exibe o painel principal do sistema.
 *
 * Este método coleta contagens de entidades importantes como pacientes, médicos, consultas e especialidades,
 * e passa esses dados para a view do dashboard. O objetivo é fornecer uma visão rápida e geral do estado
 * atual do sistema para o usuário.
 *
 * @return \Illuminate\Http\Response Retorna a view do dashboard com dados de contagem das principais entidades.
 */
    public function index()
    {
        // Contando os registros
        $patientsCount = Paciente::count();
        $doctorsCount = Medico::count();
        $consultationsCount = Consulta::count();
        $specialtiesCount = Especialidade::count();

        // Retornando a view da dashboard com as contagens
        return view('dashboard', compact('patientsCount', 'doctorsCount', 'consultationsCount', 'specialtiesCount'));
    }
}
