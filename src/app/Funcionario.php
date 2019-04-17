<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'matricula',
        'senha',
        'foto'
      ];

    protected $table = 'funcionarios';

}
