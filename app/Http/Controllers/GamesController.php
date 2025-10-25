<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use App\Models\GameRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->when(!empty($selected), fn($q) => $q->whereIn('category_id', $selected))
            ->get();

        // ids dos favoritos do usuário autenticado (para pintar o botão)
        $favoriteIds = [];
        if (Auth::check()) {
            $favoriteIds = Auth::user()->favoriteGames()->pluck('games.id')->toArray();
        }
        return view('welcome', compact('games', 'categories', 'selected', 'favoriteIds'));
    }

    /** Alterna favorito (attach/detach) */
    public function toggleFavorite(Game $game)
    {
        $user = Auth::user();

        $already = $user->favoriteGames()->where('games.id', $game->id)->exists();

        if ($already) {
            $user->favoriteGames()->detach($game->id);
            return back()->with('ok', 'Removido dos favoritos.');
        }

        $user->favoriteGames()->attach($game->id);
        return back()->with('ok', 'Adicionado aos favoritos.');
    }

    /** Página “Meus Favoritos” */
    public function favorites()
    {
        $user = Auth::user();
        $games = $user->favoriteGames()->with('category')->get();

        // Reaproveita a mesma view de listagem simples ou cria uma dedicada
        return view('games.favorites', compact('games'));
    }


    /**
     * Exibe todos os jogos em cards na listagem geral.
     */
    public function all()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function rate(Request $request, Game $game)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        GameRating::updateOrCreate(
            ['user_id' => Auth::id(), 'game_id' => $game->id],
            ['rating' => $validated['rating']]
        );

        // Recalcula a média e salva no campo classificacao_acessibilidade
        $media = $game->ratings()->avg('rating');
        $game->update(['classificacao_acessibilidade' => round($media, 1)]);

        return back()->with('success', 'Avaliação registrada com sucesso!');
    }
}
