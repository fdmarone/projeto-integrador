<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Category;
use PhpOffice\PhpSpreadsheet\IOFactory;

// Usar Excel para apresentar os jogos
class GameSeeder extends Seeder
{
    public function run(): void
    {
        // Caminho do arquivo Excel
        $path = database_path('seeders/data/jogos.xlsx');

        // Carrega o arquivo Excel usando PhpSpreadsheet
        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Remove o cabeçalho da primeira linha
        array_shift($rows);

        // Busca categorias existentes
        $categories = Category::pluck('id');

        // Itera sobre as linhas da planilha e insere no banco
        foreach ($rows as $row) {
            // Ajuste conforme as colunas da sua planilha
            [$nome, $descricao, $imagemUrl] = $row;

            Game::create([
                'nome' => $nome,
                'descricao' => $descricao,
                'imagem_url' => $imagemUrl,
                'category_id' => $categories->random(),
                'classificacao_acessibilidade' => fake()->randomFloat(1, 2.5, 5),
                'descricao_acessibilidade' => collect([
                    'modo_fácil', 'legendas', 'modo_daltônico', 'leitor_tela',
                    'controle_remapeável', 'modo_contraste', 'audio_descr',
                    'texto_ampliado', 'narração', 'modo_pacifista'
                ])->random(rand(2, 5))->implode(','),
            ]);
        }
    }
}

// class GameSeeder extends Seeder
// {
//     public function run(): void
//     {
//         $categories = Category::pluck('id');

//         Game::factory()->count(30)->create(
//             fn () => ['category_id' => $categories->random()]
//         );
//     }
// }