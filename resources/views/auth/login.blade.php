<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">{{ __('Entrar') }}</h2>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-3 text-success text-center small" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
                            </div>

                            <!-- Senha -->
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('Senha')" />
                                <x-text-input id="password" class="form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
                            </div>

                            <!-- Lembrar-me -->
                            <div class="mb-3 form-check">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <label for="remember_me" class="form-check-label">
                                    {{ __('Lembrar-me') }}
                                </label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                @if (Route::has('password.request'))
                                    <a class="small text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu a senha?') }}
                                    </a>
                                @endif

                                <x-primary-button class="btn btn-primary">
                                    {{ __('Entrar') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
