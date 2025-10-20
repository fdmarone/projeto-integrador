<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Confirmar Senha</h2>

                        <p class="text-muted small text-center mb-3">
                            Esta é uma área segura do sistema. Por favor, confirme sua senha antes de continuar.
                        </p>

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <!-- Senha -->
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('Senha')" />
                                <x-text-input id="password" class="form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
                            </div>

                            <div class="d-flex justify-content-end">
                                <x-primary-button class="btn btn-primary">
                                    {{ __('Confirmar') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
