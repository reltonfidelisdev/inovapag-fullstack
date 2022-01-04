<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosBancarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigoBanco',
        'tipoConta',
        'contaComDigito'
    ];
}
