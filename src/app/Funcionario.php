<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//importando o HASH
use Illuminate\Support\Facades\Hash;
//importanto AUTENTICAÇÃO
use Illuminate\Foundation\Auth\User as Authenticatable;
//importando PasswordResetEmail
use Illuminate\Notifications\Notifiable;


class Funcionario extends Authenticatable
{
  use Notifiable;

  protected $primaryKey = 'id';
  protected $table      = 'funcionarios';

  protected $fillable   = [
    'matricula',
    'password',
    'nome',
    'email',
    'foto',
    'nivel',
    'setor_id',
    'empresa_id',
  ];

  protected $hidden     = [
    'password', 
    'remember_token',
    
  ];

  
  public function empresa()
  {
    return $this->belongsTo(Empresa::class);
  }

  public function setor()
  {
    return $this->belongsTo(Setor::class);
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


  public static function listarTodosOsTecnicos()
  {
    return Funcionario::where('nivel', 0)->get();
  }

  public static function listarTodosOsAdministradores()
  {
    return Funcionario::where('nivel', 1)->get();
  }

  public static function listarTodos()
  {
    return Funcionario::all();
  }
  
}
