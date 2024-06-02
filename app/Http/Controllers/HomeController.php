<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            // Se estiver logado, redireciona para o dashboard
            return redirect()->route('dashboard');
        }

        // Se não estiver logado, redireciona para a página de login
        return redirect()->route('login');
    }
}
