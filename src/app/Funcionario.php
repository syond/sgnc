<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//importando o HASH
use Illuminate\Support\Facades\Hash;

class Funcionario extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'funcionarios';

  protected $fillable = [
      'matricula',
      'senha',
      'nome',
      'email',
      'foto'
    ];

    //Função HASH da senha
    public function setSenhaAttribute($senha){
      
      if($senha !== null & $senha !== ''){

        $this->attributes['senha'] = Hash::make($senha);
      
      }
      else{

        echo "Preenchimento da senha obrigatório!";
      
      }
      
    }
      
    

}
