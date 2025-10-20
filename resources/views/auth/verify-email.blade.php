<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">

                        <h2 class="card-title mb-4">Verifique seu E-mail</h2>

                        <p class="text-muted small">
                            Obrigado por se registrar! Antes de começar, por favor verifique seu endereço de e-mail clicando no link que acabamos de enviar.
                            Se você não recebeu o e-mail, nós enviaremos outro com prazer.
                        </p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success mt-3 small">
                                Um novo link de verificação foi enviado para o e-mail informado durante o cadastro.
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <x-primary-button class="btn btn-primary">
                                    {{ __('Reenviar E-mail de Verificação') }}
                                </x-primary-button>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary">
                                    {{ __('Sair') }}
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
