<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $games = Game::when($q, fn($s)=> $s->where('nome','like',"%$q%"))
            ->latest('id')->paginate(12)->withQueryString();

        return view('admin.games.index', compact('games','q'));
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome'  => ['required','string','max:255'],
            'descricao' => ['nullable','string'],
            'classificacao_acessibilidade' => ['nullable','string','max:255'],
            'descricao_acessibilidade' => ['nullable','string'],
            'imagem_url' => ['nullable','url'],
        ]);

        Game::create($data);
        return redirect()->route('admin.games.index')->with('ok','Jogo criado.');
    }

    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $data = $request->validate([
            'nome'  => ['required','string','max:255'],
            'descricao' => ['nullable','string'],
            'classificacao_acessibilidade' => ['nullable','string','max:255'],
            'descricao_acessibilidade' => ['nullable','string'],
            'imagem_url' => ['nullable','url'],
        ]);

        $game->update($data);
        return redirect()->route('admin.games.index')->with('ok','Jogo atualizado.');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return back()->with('ok','Jogo removido.');
    }
}
