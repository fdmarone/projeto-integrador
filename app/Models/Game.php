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
        'imagem_url',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
    
    public function ratings()
    {
        return $this->hasMany(GameRating::class);
    }

    public function averageAccessibility()
    {
        return $this->ratings()->avg('rating');
    }
}
