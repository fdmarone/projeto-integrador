<x-app-layout>
    <x-slot name="header">
        <div class="container py-3">
            <h2 class="text-center fw-semibold fs-3 text-dark">
                {{ __('Perfil') }}
            </h2>
        </div>
    </x-slot>

    <div class="container py-5">
        <div class="accordion" id="profileAccordion">

            {{-- Informações do Perfil --}}
            <div class="accordion-item mb-3 shadow-sm">
                <h2 class="accordion-header" id="headingProfile">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile">
                        {{ __('Informações do Perfil') }}
                    </button>
                </h2>
                <div id="collapseProfile" class="accordion-collapse collapse" aria-labelledby="headingProfile" data-bs-parent="#profileAccordion">
                    <div class="accordion-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            {{-- Atualizar Senha --}}
            <div class="accordion-item mb-3 shadow-sm">
                <h2 class="accordion-header" id="headingPassword">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePassword" aria-expanded="false" aria-controls="collapsePassword">
                        {{ __('Atualizar Senha') }}
                    </button>
                </h2>
                <div id="collapsePassword" class="accordion-collapse collapse" aria-labelledby="headingPassword" data-bs-parent="#profileAccordion">
                    <div class="accordion-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            {{-- Excluir Conta --}}
            <div class="accordion-item shadow-sm">
                <h2 class="accordion-header" id="headingDelete">
                    <button class="accordion-button collapsed text-danger" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDelete" aria-expanded="false" aria-controls="collapseDelete">
                        {{ __('Excluir Conta') }}
                    </button>
                </h2>
                <div id="collapseDelete" class="accordion-collapse collapse" aria-labelledby="headingDelete" data-bs-parent="#profileAccordion">
                    <div class="accordion-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
