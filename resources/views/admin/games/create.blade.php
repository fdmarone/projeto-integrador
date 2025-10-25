<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Novo Jogo</h2></x-slot>
    @include('admin.games.form', ['route' => route('admin.games.store'), 'method' => 'POST', 'game' => null])
</x-app-layout>
