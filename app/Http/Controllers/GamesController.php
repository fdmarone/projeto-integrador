<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Exibe os jogos em destaque na dashboard com carrossel e filtro por categoria.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $selected = (array) $request->input('categories', []);

        $games = Game::with('category')
            ->when(!empty($selected), function ($query) use ($selected) {
                $query->whereIn('category_id', $selected);
            })
            ->get();

        return view('dashboard', compact('games', 'categories', 'selected'));
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
