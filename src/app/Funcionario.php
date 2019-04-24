<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//importando o HASH
use Illuminate\Support\Facades\Hash;

//importando e implementando para realizar autenticação de usuário
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;


class Funcionario extends Model implements Authenticatable
{

  use AuthenticableTrait ;

  protected $primaryKey = 'id';
  protected $table      = 'funcionarios';

  protected $fillable   = [
    'matricula',
    'senha',
    'nome',
    'email',
    'foto'
  ];

  protected $hidden     = [
    'senha', 
    'remember_token'
  ];

  //Função HASH da senha
  public function setSenhaAttribute($senha){

    $this->attributes['senha'] = Hash::make($senha);

  }
}
