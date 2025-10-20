<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    public function definition(): array
{
    $tags = [
        'modo_fácil', 'legendas', 'modo_daltônico', 'leitor_tela',
        'controle_remapeável', 'modo_contraste', 'audio_descr',
        'texto_ampliado', 'narração', 'modo_pacifista'
    ];

    $imagens = [
        'https://placehold.co/600x400?text=Game+1',
        'https://placehold.co/600x400?text=Game+2',
        'https://placehold.co/600x400?text=Game+3',
        'https://placehold.co/600x400?text=Game+4',
        'https://placehold.co/600x400?text=Game+5',
        'https://placehold.co/600x400?text=Game+6',
    ];

    return [
        'nome' => $this->faker->unique()->words(2, true),
        'descricao' => $this->faker->sentence(12),
        'classificacao_acessibilidade' => $this->faker->randomFloat(1, 0, 5),
        'descricao_acessibilidade' => collect($tags)->random(rand(2, 5))->implode(','),
        'imagem_url' => collect($imagens)->random(),
    ];
}

}
