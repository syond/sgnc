<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'funcionarios';

    protected $fillable = [
        'nome',
        'email',
        'matricula',
        'senha',
        'foto'
      ];

    

}
