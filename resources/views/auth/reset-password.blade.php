<x-guest-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Redefinir Senha</h2>

                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- E-mail -->
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('E-mail')" />
                                <x-text-input id="email" class="form-control" type="email" name="email"
                                    :value="old('email', $request->email)" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
                            </div>

                            <!-- Nova senha -->
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('Nova Senha')" />
                                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
                            </div>

                            <!-- Confirmar senha -->
                            <div class="mb-4">
                                <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />
                                <x-text-input id="password_confirmation" class="form-control"
                                    type="password" name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-1" />
                            </div>

                            <div class="d-flex justify-content-end">
                                <x-primary-button class="btn btn-primary">
                                    {{ __('Redefinir Senha') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>