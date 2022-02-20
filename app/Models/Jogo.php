<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function getUrlAttribute() {
        return route('discussao', ['jogo' => $this->id]);
    }

    public function getContadorAttribute() {
        return $this->discussoes_count ?? 0;
    }

    public function discussoes() {
        return $this->hasMany(Discussao::class, 'jogo_id', 'id');
    }
}
