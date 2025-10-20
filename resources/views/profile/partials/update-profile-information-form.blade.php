<form method="post" action="{{ route('profile.update') }}" class="mt-3">
    @csrf
    @method('patch')

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" id="name"
               value="{{ old('name', $user->name) }}"
               class="form-control" required autofocus>
        <x-input-error :messages="$errors->get('name')" class="text-danger mt-1" />
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" id="email"
               value="{{ old('email', $user->email) }}"
               class="form-control" required>
        <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
    </div>

    <div class="d-flex align-items-center justify-content-between">
        <button type="submit" class="btn btn-primary">Salvar</button>

        @if (session('status') === 'profile-updated')
            <span class="text-success small ms-2">Salvo.</span>
        @endif
    </div>
</form>
