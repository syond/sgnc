<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $primarykey = 'id';
    protected $table = 'empresas';

    protected $fillable = [
        'cnpj',
        'nome_fantasia',
        'razao_social',
    ];
}
