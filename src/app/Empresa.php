<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;

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

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class);
    }

    public function imediatas()
    {
        return $this->hasMany(Imediata::class);
    }

    public function corretivas()
    {
        return $this->hasMany(Corretiva::class);
    }

    public function nao_conformidades()
    {
        return $this->hasMany(NaoConformidade::class);
    }



    public static function listarJoinEmpresaFuncionario($paginate)
    {
        return Funcionario::join('empresas', 'empresas.funcionario_id', 'funcionarios.id')
                        ->orderBy('empresas.created_at', 'DESC')
                        ->paginate($paginate);
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
