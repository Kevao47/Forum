<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussaoComentario extends Model {
    use HasFactory;
    protected $fillable = [
        'discussao_id',
        'user_id',
        'texto',
    ];

    public function usuario() {
        return $this->hasOne(Usuario::class, 'id', 'user_id');
    }
}
