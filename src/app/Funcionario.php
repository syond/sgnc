<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//importando o HASH
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Funcionario extends Authenticatable
{

  protected $primaryKey = 'id';
  protected $table      = 'funcionarios';

  protected $fillable   = [
    'matricula',
    'password',
    'nome',
    'email',
    'foto',
    'nivel',
  ];

  protected $hidden     = [
    'password', 
    'remember_token'
  ];

  
  public function empresas()
  {
    return $this->hasMany(Empresa::class);
  }

  public function equipamentos()
  {
    return $this->hasMany(Equipamento::class);
  }
  
  public function onibus()
  {
    return $this->hasMany(Onibus::class);
  }

  //Função HASH da senha
  public function setPasswordAttribute($password){

      try {
        $this->attributes['password'] = Hash::make($password);

      } catch (Exception $e) {
        $e->getMessage();
      }
    
  }

  //public function isAdmin()
  //{
  //    Funcionario::where('nivel', 1);
      
  //}
}
