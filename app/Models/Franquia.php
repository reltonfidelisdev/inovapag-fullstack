<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franquia extends Model
{
    use HasFactory;
    protected $fillable = [
        'cnpj',
        'nomeComercial'
    ];
}
