<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Exibe os jogos em destaque na dashboard com carrossel.
     */
    public function index()
    {
        $games = Game::all(); // <-- importante!
        return view('dashboard', compact('games'));
    }

    /**
     * Exibe todos os jogos em cards na listagem geral.
     */
    public function all()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }
}
