<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jogos em Destaque') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        @if ($games->isEmpty())
            <p>Nenhum jogo encontrado.</p>
        @else
            <div class="row">
                @foreach ($games as $game)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if ($game->imagem_url)
                                <img src="{{ $game->imagem_url }}" class="card-img-top" alt="Capa do jogo {{ $game->nome }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $game->nome }}</h5>
                                <p class="card-text">{{ $game->descricao }}</p>
                                <p class="card-text">
                                    <strong>Acessibilidade:</strong>
                                    {{ $game->classificacao_acessibilidade }} ★
                                    <br>
                                    <small>{{ $game->descricao_acessibilidade }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
