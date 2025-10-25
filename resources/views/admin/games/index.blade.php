<x-app-layout>
    <x-slot name="header"><div class="d-flex justify-content-between align-items-center">
        <h2 class="font-semibold text-xl">Jogos</h2>
        <a class="btn btn-primary btn-sm" href="{{ route('admin.games.create') }}">Novo Jogo</a>
    </div></x-slot>

    <div class="p-4">
        @if(session('ok')) <div class="alert alert-success">{{ session('ok') }}</div> @endif

        <form method="GET" class="mb-3 d-flex gap-2">
            <input type="text" name="q" value="{{ $q }}" class="form-control w-auto" placeholder="Buscar por nome">
            <button class="btn btn-secondary">Buscar</button>
        </form>

        <div class="table-responsive">
            <table class="table table-sm align-middle">
                <thead><tr>
                    <th>Nome</th><th>Acessibilidade</th><th>Imagem</th><th class="text-end">Ações</th>
                </tr></thead>
                <tbody>
                @forelse($games as $g)
                    <tr>
                        <td>{{ $g->nome }}</td>
                        <td>{{ $g->classificacao_acessibilidade }}</td>
                        <td class="text-truncate" style="max-width: 260px">{{ $g->imagem_url }}</td>
                        <td class="text-end d-flex justify-content-end gap-2">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.games.edit',$g) }}">Editar</a>
                            <form method="POST" action="{{ route('admin.games.destroy',$g) }}"
                                  onsubmit="return confirm('Remover este jogo?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Nenhum jogo.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{ $games->links() }}
    </div>
</x-app-layout>
