<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Game;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Exibe o painel admin com contagem de usuários e jogos
    public function index()
    {
        $totalUsers = User::count();
        $totalGames = Game::count();

        return view('admin.dashboard', compact('totalUsers', 'totalGames'));
    }

    // Você pode adicionar métodos aqui para gerenciar usuários e jogos depois:
    // - listUsers()
    // - editUser()
    // - deleteUser()
    // - listGames()
    // - editGame()
    // - deleteGame()
}
