<x-app-layout>
    <x-slot name="header">
        <div>
        <div class="container position-relative p-0">
            <div class="logo">
                <img src="https://marketplace.canva.com/eyOFA/MAGxQZeyOFA/1/tl/canva-pixelated-game-controller-illustration-MAGxQZeyOFA.png" alt="" class="w-12">
                <h2 class="fw-semibold fs-4 mb-2 mb-sm-0 text-dark">
                    {{ __('PlayForAll') }}
                </h2>
            </div>
            <div class="position-absolute end-0 top-50 translate-middle-y">
                <x-return-to-selected-page route="dashboard" />
            </div>
        </div>
    </x-slot>

    <div class="py-6 px-4">
        <h2 class="text-2xl mb-2">
            {{ __('Perfil') }}
        </h2>

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
