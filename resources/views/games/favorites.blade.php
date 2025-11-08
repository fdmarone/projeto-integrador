<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center w-100 mb-4">
            <h2 class="font-semibold text-xl mb-0">Meus Favoritos</h2>
            <x-return-to-selected-page route="dashboard"/>
        </div>
    </x-slot>

    <div class="py-6 px-4">
        @if ($games->isEmpty())
            <div class="alert alert-info">Você ainda não favoritou nenhum jogo.</div>
        @else
            <div class="row">
                @foreach ($games as $game)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-primary shadow-sm">
                            @if ($game->imagem_url)
                                <img src="{{ $game->imagem_url }}" class="card-img-top" alt="Capa do jogo {{ $game->nome }}" style="height:180px;object-fit:cover;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">{{ $game->nome }}</h5>
                                <p class="card-text mb-2">{{ Str::limit($game->descricao, 120) }}</p>
                                <div class="mt-auto">
                                    <p class="mb-1">
                                        <strong>Acessibilidade:</strong>
                                        <span class="ms-1">{{ $game->classificacao_acessibilidade ?? '—' }}</span>
                                    </p>

                                    @if(optional($game->category)->name)
                                        <p class="mb-2"><small class="text-muted">Categoria: <span class="badge bg-secondary">{{ $game->category->name }}</span></small></p>
                                    @endif

                                    @if(!empty($game->descricao_acessibilidade))
                                        <p class="mb-2"><small class="text-muted">{{ ucwords(str_replace(['_', ','], [' ', ', '], $game->descricao_acessibilidade)) }}</small></p>
                                    @endif

                                    <form method="POST" action="{{ route('games.favorite', $game) }}" class="mt-2">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" aria-label="Remover {{ $game->nome }} dos favoritos">Remover dos Favoritos</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
