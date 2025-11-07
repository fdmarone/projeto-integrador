<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="logo">
                <img src="https://marketplace.canva.com/eyOFA/MAGxQZeyOFA/1/tl/canva-pixelated-game-controller-illustration-MAGxQZeyOFA.png" alt="" class="w-12">
                <h2 class="fw-semibold fs-4 mb-2 mb-sm-0 text-dark">
                    {{ __('PlayForAll') }}
                </h2>
            </div>
            <x-return-to-selected-page route="dashboard"/>
        </div>
    </x-slot>
    
    <div class="py-6 px-4">
        <h2 class="text-2xl mb-2">Meus Favoritos</h2>
        @if ($games->isEmpty())
            <div class="alert alert-info">Você ainda não favoritou nenhum jogo.</div>
        @else
            <div class="row">
                @foreach ($games as $game)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-primary shadow-sm">
                            @if ($game->imagem_url)
                                <img src="{{ $game->imagem_url }}" class="card-img-top" alt="Capa do jogo {{ $game->nome }}">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">{{ $game->nome }}</h5>
                                <p class="card-text mb-2">{{ Str::limit($game->descricao, 120) }}</p>
                                <div class="mt-auto">
                                    <p class="mb-1"><strong>Acessibilidade:</strong> {{ $game->classificacao_acessibilidade }}</p>
                                    <!-- <p class="mb-0"><small>{{ $game->descricao_acessibilidade }}</small></p> -->
                                    <p class="mb-2 text-sm mt-0.5 text-gray-500"><small>{{ ucwords(str_replace(['_', ','], [' ', ', '], $game->descricao_acessibilidade)) }}</small></p>
                                    <form method="POST" action="{{ route('games.favorite', $game) }}" class="mt-2">
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Remover dos Favoritos</button>
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
