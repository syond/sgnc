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


  //Função HASH da senha
  public function setPasswordAttribute($password){

      try {
        $this->attributes['password'] = Hash::make($password);

      } catch (Exception $e) {
        $e->getMessage();
      }
    
  }


    public static function buscarFuncionarioCadastrado($search, $paginate)
    {
        return Funcionario::where('matricula', 'like', '%'.$search.'%')
                        ->orWhere('nome', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%')
                        ->paginate($paginate);
    }
  
}
