<div class="text-center">
    <button type="button"
            class="btn btn-danger"
            data-bs-toggle="modal"
            data-bs-target="#confirmUserDeletion">
        Excluir conta
    </button>
</div>

<!-- Modal Bootstrap -->
<div class="modal fade" id="confirmUserDeletion" tabindex="-1" aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="modal-header">
                    <h5 class="modal-title" id="confirmUserDeletionLabel">Tem certeza que deseja excluir sua conta?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <p>Ao excluir sua conta, todos os seus dados serão apagados permanentemente. Digite sua senha para confirmar.</p>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password"
                               class="form-control"
                               placeholder="Senha">
                        <x-input-error :messages="$errors->userDeletion->get('password')" class="text-danger mt-1" />
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>
