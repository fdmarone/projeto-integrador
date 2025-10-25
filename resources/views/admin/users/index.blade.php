<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center justify-content-between w-100">
            <h2 class="font-semibold text-xl mb-0">Usuários</h2>
            <a href="{{ route('dashboard.admin') }}" class="btn btn-outline-secondary btn-sm">
                ← Voltar ao Painel Admin
            </a>
        </div>
    </x-slot>



    <div class="p-4">
        @if(session('ok')) <div class="alert alert-success">{{ session('ok') }}</div> @endif

        <form method="GET" class="mb-3 d-flex gap-2">
            <input type="text" name="q" value="{{ $q }}" class="form-control w-auto"
                placeholder="Buscar por nome/email">
            <button class="btn btn-secondary">Buscar</button>
        </form>

        <div class="table-responsive">
            <table class="table table-sm align-middle">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $u)
                    <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.users.toggleAdmin',$u) }}">
                                @csrf @method('PATCH')
                                <button class="btn btn-outline-{{ $u->is_admin ? 'success':'secondary' }} btn-sm">
                                    {{ $u->is_admin ? 'Sim' : 'Não' }}
                                </button>
                            </form>
                        </td>
                        <td class="text-end d-flex justify-content-end gap-2">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit',$u) }}">Editar</a>
                            <form method="POST" action="{{ route('admin.users.destroy',$u) }}"
                                onsubmit="return confirm('Remover este usuário?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" {{ auth()->id()===$u->id ? 'disabled':''
                                    }}>Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">Nenhum usuário.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $users->links() }}
    </div>
</x-app-layout>