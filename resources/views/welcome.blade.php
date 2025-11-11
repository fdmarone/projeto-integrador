<x-app-layout>
    <x-slot name="header">
        <div class="w-100 d-flex justify-content-between align-items-center flex-wrap">
            <div class="logo">
                <img src="https://i.ibb.co/Dn4bkBp/game1.png" alt="" class="w-12">
                <h2 class="fw-semibold fs-4 mb-2 mb-sm-0 text-dark">
                    {{ __('PlayForAll') }}
                </h2>
            </div>

            @if (Route::has('login'))
            <div class="d-flex align-items-center gap-5">
                @auth
                <a href="{{ url('/dashboard') }}" class="text-decoration-none text-gray-600 fw-semibold">
                    Dashboard
                </a>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Nome do usuário -->
                @auth
                <li class="nav-item dropdown text-gray-600 fw-semibold">
                    <a class="nav-link dropdown-toggle p-0" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('me.favorites') }}">
                                Meus Favoritos
                            </a>
                        </li>

                        @if(auth()->user()?->is_admin)
                        <li>
                            <a class="dropdown-item" href="{{ route('dashboard.admin') }}">
                                Painel Admin
                            </a>
                        </li>
                        @endif

                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth

            </ul>
                @else
                <a href="{{ route('login') }}" class="text-decoration-none text-gray-600 fw-semibold">
                    Log in
                </a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-decoration-none text-gray-600 fw-semibold">
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
