<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setor extends Model
{
    
    protected $primarykey = 'id';
    protected $table = 'setores';

    protected $fillable = [
        'nome',
        'empresa_id',
        'funcionario_id',
    ];

    protected $hidden     = [
         
    ];
      

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }

    public function nao_conformidades()
    {
        return $this->hasMany(NaoConformidade::class);
    }



    public static function listarTodos()
    {
        return Setor::all();
    }

    public static function listarJoinSetorEmpresa($paginate)
    {
        return Empresa::join('setores', 'setores.empresa_id', 'empresas.id')->paginate($paginate);
    }

    
    public static function buscarSetorCadastrado($search, $paginate)
    {
        return Empresa::join('setores', 'setores.empresa_id', 'empresas.id')
                        ->where('setores.nome', 'like', '%'.$search.'%')
                        ->orWhere('empresas.nome_fantasia', 'like', '%'.$search.'%')
                        ->paginate($paginate);
    }


    public static function verficarSeExisteSetorCadastrado($dados)
    {
        return Setor::where('nome', $dados['nome'])->where('empresa_id', $dados['empresa_id'])->count();
    }
}
