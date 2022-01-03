<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'cidade',
        'logradouro',
        'complemento',
        'numero',
        'cep',
        'pontoReferencia'
    ];
}
