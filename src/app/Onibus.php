<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Onibus extends Model
{
    protected $primarykey = 'id';
    protected $table = 'onibus';

    protected $fillable = [
        'modelo',
        'placa',
        'chassi',
        'numero',
        'ano',
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



    public static function listarJoinOnibusEmpresa($paginate)
    {
        return Empresa::join('onibus', 'onibus.empresa_id', 'empresas.id')->paginate($paginate);
    }

    
    public static function buscarOnibusCadastrado($search, $paginate)
    {
        return Empresa::join('onibus', 'onibus.empresa_id', 'empresas.id')
                        ->where('onibus.modelo', 'like', '%'.$search.'%')
                        ->orWhere('onibus.placa', 'like', '%'.$search.'%')
                        ->orWhere('onibus.chassi', 'like', '%'.$search.'%')
                        ->orWhere('onibus.numero', 'like', '%'.$search.'%')
                        ->orWhere('onibus.ano', 'like', '%'.$search.'%')
                        ->orWhere('empresas.nome_fantasia', 'like', '%'.$search.'%')
                        ->paginate($paginate);
    }
}
