<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jogos em Destaque') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <!-- Filtro por múltiplas categorias -->
        <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
            <label for="categories" class="form-label">Filtrar por acessibilidade:</label>
            <select name="categories[]" id="categories" class="form-select selectpicker w-50"
                multiple data-live-search="true" data-actions-box="true" title="Selecione as categorias">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ in_array($category->id, $selected ?? []) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary mt-2">Filtrar</button>
        </form>

        @if ($games->isEmpty())
        <div class="alert alert-warning">Nenhum jogo encontrado.</div>
        @else
        <div class="row">
            @foreach ($games as $game)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-primary shadow-sm">
                    @if ($game->imagem_url)
                    <img src="{{ $game->imagem_url }}" class="card-img-top" alt="Capa do jogo {{ $game->nome }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">{{ $game->nome }}</h5>
                        <p class="card-text mb-2">{{ Str::limit($game->descricao, 120) }}</p>

                        <div class="mt-auto">
                            <p class="mb-1">
                                <strong>Acessibilidade:</strong> {{ $game->classificacao_acessibilidade }} ★
                            </p>
                            <p class="mb-1 text-muted"><small>{{ $game->descricao_acessibilidade }}</small></p>
                            <p class="mb-0"><strong>Categoria:</strong> {{ $game->category->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</x-app-layout>