<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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


    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
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
}
