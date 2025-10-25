<div class="p-4 col-lg-8">
    @if($errors->any())
        <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif

    <form method="POST" action="{{ $route }}" class="vstack gap-3">
        @csrf @method($method)

        <div>
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $game->nome ?? '') }}" required>
        </div>

        <div>
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="3">{{ old('descricao', $game->descricao ?? '') }}</textarea>
        </div>

        <div>
            <label class="form-label">Classificação de Acessibilidade</label>
            <input type="text" name="classificacao_acessibilidade" class="form-control"
                   value="{{ old('classificacao_acessibilidade', $game->classificacao_acessibilidade ?? '') }}">
        </div>

        <div>
            <label class="form-label">Descrição de Acessibilidade</label>
            <textarea name="descricao_acessibilidade" class="form-control" rows="3">{{ old('descricao_acessibilidade', $game->descricao_acessibilidade ?? '') }}</textarea>
        </div>

        <div>
            <label class="form-label">URL da Imagem (opcional)</label>
            <input type="url" name="imagem_url" class="form-control" value="{{ old('imagem_url', $game->imagem_url ?? '') }}">
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">Voltar</a>
            <button class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
