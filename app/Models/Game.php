<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'classificacao_acessibilidade',
        'descricao_acessibilidade',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
