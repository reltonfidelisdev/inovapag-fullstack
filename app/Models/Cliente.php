<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'nomeCompleto',
        'cpf',
        'rg',
        'dataNascimento',
        'sexo',
        'grauEscolaridade'
    ];
    /**
     * @var mixed|string
     */
}
