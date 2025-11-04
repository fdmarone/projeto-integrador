<x-app-layout>
    <x-slot name="header">
        <div class="w-100 d-flex justify-content-between align-items-center flex-wrap">
            <div class="logo">
                <img src="https://marketplace.canva.com/eyOFA/MAGxQZeyOFA/1/tl/canva-pixelated-game-controller-illustration-MAGxQZeyOFA.png" alt="" class="w-12">
                <h2 class="fw-semibold fs-4 mb-2 mb-sm-0 text-dark">
                    {{ __('PlayForAll') }}
                </h2>
            </div>

            @if (Route::has('login'))
            <div class="d-flex align-items-center gap-3">
                @auth
                <a href="{{ url('/dashboard') }}" class="text-decoration-none text-gray-500 fw-semibold">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}" class="text-decoration-none text-gray-500 fw-semibold">
                    Log in
                </a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-decoration-none text-gray-500 fw-semibold">
                    Registre-se
                </a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </x-slot>


    <x-dashboard-content :games="$games" :categories="$categories" :selected="$selected" />
</x-app-layout>
