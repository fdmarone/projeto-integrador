<form method="post" action="{{ route('password.update') }}" class="mt-3">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="update_password_current_password" class="form-label">Senha atual</label>
        <input type="password" name="current_password" id="update_password_current_password"
               class="form-control" autocomplete="current-password">
        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-danger mt-1" />
    </div>

    <div class="mb-3">
        <label for="update_password_password" class="form-label">Nova senha</label>
        <input type="password" name="password" id="update_password_password"
               class="form-control" autocomplete="new-password">
        <x-input-error :messages="$errors->updatePassword->get('password')" class="text-danger mt-1" />
    </div>

    <div class="mb-3">
        <label for="update_password_password_confirmation" class="form-label">Confirmar nova senha</label>
        <input type="password" name="password_confirmation" id="update_password_password_confirmation"
               class="form-control" autocomplete="new-password">
        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-danger mt-1" />
    </div>

    <div class="d-flex align-items-center justify-content-between">
        <button type="submit" class="btn btn-primary">Salvar</button>

        @if (session('status') === 'password-updated')
            <span class="text-success small ms-2">Salvo.</span>
        @endif
    </div>
</form>
