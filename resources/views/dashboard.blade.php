<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jogos em Destaque') }}
        </h2>
    </x-slot>

    <x-dashboard-content :games="$games" :categories="$categories" :selected="$selected" />
</x-app-layout>