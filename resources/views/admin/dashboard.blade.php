<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Painel Administrativo
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <div class="alert alert-primary">
            <p><strong>Total de Usuários:</strong> {{ $totalUsers }}</p>
            <p><strong>Total de Jogos:</strong> {{ $totalGames }}</p>
        </div>

        <div class="mt-4">
            <h5>Gerenciar:</h5>
            <ul class="list-unstyled">
                <li class="mb-2">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary btn-sm">
                        Usuários
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.games.index') }}" class="btn btn-outline-primary btn-sm">
                        Jogos
                    </a>
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>
