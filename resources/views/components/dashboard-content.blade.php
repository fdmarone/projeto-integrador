<div class="py-6 px-4">
    <h2 class="text-2xl mb-4">Jogos em Destaque</h2>
    <!-- Filtro por múltiplas categorias -->
    <form method="GET" action="{{ request()->routeIs('dashboard') ? route('dashboard') : route('home') }}" class="mb-4">
        <label for="categories" class="form-label text-lg mr-2">Filtrar por acessibilidade:</label>
        <select name="categories[]" id="categories" class="form-select selectpicker w-50 p-0 rounded-lg mr-4" multiple
            data-live-search="true" data-actions-box="true" title="Selecione as categorias">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ in_array($category->id, $selected ?? []) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary h-18 w-20">Filtrar</button>
    </form>

    @if ($games->isEmpty())
    <div class="alert alert-warning">Nenhum jogo encontrado.</div>
    @else
    <div class="row">
        @foreach ($games as $game)
        <div class="col-md-3 mb-3 card-master">
            <div class="card border-primary h-100 shadow-sm">
                @if ($game->imagem_url)
                <img src="{{ $game->imagem_url }}" class="card-img-top" alt="Capa do jogo {{ $game->nome }}">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ ucwords(str_replace('_', ' ', $game->nome)) }}</h5>
                    <p class="card-text mb-3 text-sm">{{ Str::limit($game->descricao, 120) }}</p>

                    <div class="mt-auto">
                        <p class="mb-1 text-8px"><strong>Acessibilidade:</strong> {{ $game->classificacao_acessibilidade }}</p>
                        <div class="p-0">
                            <p class="mb-0"><strong>Categoria:</strong> {{ number_format($game->classificacao_acessibilidade, 1) ?? 'N/A' }}</p>
                            <!-- <p class="mb-0"><strong>Categoria:</strong> {{ $game->category->name ?? 'N/A' }}</p> -->
                            <!-- <p class="mb-0"><small>{{ $game->descricao_acessibilidade }}</small></p> -->
                             <p class="mb-2 text-sm mt-0.5 text-gray-500">{{ ucwords(str_replace(['_', ','], [' ', ', '], $game->descricao_acessibilidade)) }}
                             </p>
                        </div>

                        @auth
                        @php
                        $isFav = Auth::user()
                        ->favoriteGames()
                        ->where('games.id', $game->id)
                        ->exists();
                        @endphp

                        <form method="POST" action="{{ route('games.favorite', $game) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $isFav ? 'btn-danger' : 'btn-outline-danger' }}">
                                {{ $isFav ? 'Remover dos Favoritos' : 'Favoritar ♥' }}
                            </button>
                        </form>

                        <form method="POST" action="{{ route('games.rate', $game) }}" class="mt-2">
                            @csrf
                            <label for="rating-{{ $game->id }}" class="form-label mb-1">Avalie a acessibilidade:</label>
                            <div class="d-flex align-items-center gap-1">
                                @for ($i = 1; $i <= 5; $i++) <button type="submit" name="rating" value="{{ $i }}"
                                    class="btn btn-sm {{ optional(Auth::user()->gameRatings->where('game_id', $game->id)->first())->rating == $i ? 'btn-warning' : 'btn-outline-warning' }}">
                                    {{ $i }}
                                    </button>
                                    @endfor
                            </div>
                        </form>

                        @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary">
                            Favoritar ♥ (entre para salvar)
                        </a>


                        @endauth
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>