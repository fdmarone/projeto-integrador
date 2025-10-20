<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Recuperar Senha</h2>

                        <p class="text-muted small text-center mb-3">
                            Esqueceu sua senha? Sem problemas. Informe seu endereço de e-mail e enviaremos um link para você redefinir sua senha.
                        </p>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-3 text-success text-center small" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- E-mail -->
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('E-mail')" />
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
                            </div>

                            <div class="d-flex justify-content-end">
                                <x-primary-button class="btn btn-primary">
                                    {{ __('Enviar link de redefinição') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
