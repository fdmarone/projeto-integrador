<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Editar Jogo</h2></x-slot>
    @include('admin.games.form', ['route' => route('admin.games.update',$game), 'method' => 'PATCH', 'game' => $game])
</x-app-layout>
