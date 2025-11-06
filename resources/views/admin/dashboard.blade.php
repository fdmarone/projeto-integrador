<x-app-layout>
    <x-slot name="header">
        <div class="container py-3 position-relative mb-4">
            <h2 class="w-100 text-center text-xl font-semibold fs-3 text-dark mb-0">
                Painel Administrativo
            </h2>
            <div class="position-absolute end-0 top-50 translate-middle-y">
                <x-return-to-selected-page route="dashboard" />
            </div>
        </div>
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
