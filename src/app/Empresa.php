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
        'funcionario_id',
    ];

    protected $hidden     = [
         
      ];


    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function onibus()
    {
        return $this->hasMany(Onibus::class);
    }

    public function setores()
    {
        return $this->hasMany(Setor::class);
    }



    public static function listarJoinEmpresaFuncionario($paginate)
    {
        return Funcionario::join('empresas', 'empresas.funcionario_id', 'funcionarios.id')->paginate($paginate);
    }

    
    public static function buscarEmpresaCadastrada($search, $paginate)
    {

        /**
         * Query para busca no banco de dados comparando com o que foi digitado
         * no campo de Busca e retornando apenas 5 registros por página
         *  */
        return Funcionario::join('empresas', 'empresas.funcionario_id', 'funcionarios.id')
                        ->where('empresas.cnpj', 'like', '%'.$search.'%')
                        ->orWhere('empresas.nome_fantasia', 'like', '%'.$search.'%')
                        ->orWhere('empresas.razao_social', 'like', '%'.$search.'%')
                        ->orWhere('funcionarios.nome', 'like', '%'.$search.'%')
                        ->paginate($paginate);
    }
}
