<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Editar Usuário</h2></x-slot>

    <div class="p-4 col-lg-6">
        @if($errors->any())
            <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif
        <form method="POST" action="{{ route('admin.users.update',$user) }}" class="vstack gap-3">
            @csrf @method('PATCH')
            <div>
                <label class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}" required>
            </div>
            <div>
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email',$user->email) }}" required>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Voltar</a>
                <button class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</x-app-layout>
