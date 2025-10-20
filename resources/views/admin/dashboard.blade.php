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
            <ul>
                <li><a href="#">Usuários</a> (em breve)</li>
                <li><a href="#">Jogos</a> (em breve)</li>
            </ul>
        </div>
    </div>
</x-app-layout>
