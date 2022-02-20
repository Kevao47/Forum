<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussao extends Model {
    use HasFactory;
    protected $table = 'discussoes';

    protected $fillable = [
        'titulo',
        'texto',
        'jogo_id'
    ];

    public function getUrlAttribute() {
        return route('show-discussao', ['id' => $this->id]);
    }

    public function getContadorAttribute() {
        return $this->comentarios_count ?? 0;
    }
    public function comentarios() {
        return $this->hasMany(DiscussaoComentario::class, 'discussao_id', 'id')->with('usuario');
    }

    public function categorias() {
        return $this->hasManyThrough(Categoria::class, DiscussaoCategoria::class, 'categoria_id', 'id', 'id', 'discussao_id');
    }

    public function comentar($texto) {
        return DiscussaoComentario::create([
            'discussao_id' => $this->id,
            'user_id' => auth()->user()->id,
            'texto' => $texto
        ]);
    }
}
