<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Category;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id');

        Game::factory()->count(30)->create(
            fn () => ['category_id' => $categories->random()]
        );
    }
}
