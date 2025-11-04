<x-app-layout>
    <x-slot name="header">
        <div class="logo">
            <img src="https://marketplace.canva.com/eyOFA/MAGxQZeyOFA/1/tl/canva-pixelated-game-controller-illustration-MAGxQZeyOFA.png" alt="" class="w-12">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('PlayForAll') }}
            </h2>
        </div>
    </x-slot>

    <x-dashboard-content :games="$games" :categories="$categories" :selected="$selected" />
</x-app-layout>