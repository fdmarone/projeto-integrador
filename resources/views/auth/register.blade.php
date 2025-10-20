<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">{{ __('Cadastre-se') }}</h2>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <x-input-label for="name" :value="__('Nome')" />
                                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="text-danger mt-1" />
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('Senha')" />
                                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <x-input-label for="password_confirmation" :value="__('Confirme Senha')" />
                                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-1" />
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a class="text-decoration-none small" href="{{ route('login') }}">
                                    {{ __('Já possui cadastro?') }}
                                </a>
                                <x-primary-button class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
