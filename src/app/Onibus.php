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
                        ->where('modelo', 'like', '%'.$search.'%')
                        ->orWhere('placa', 'like', '%'.$search.'%')
                        ->orWhere('chassi', 'like', '%'.$search.'%')
                        ->orWhere('numero', 'like', '%'.$search.'%')
                        ->orWhere('ano', 'like', '%'.$search.'%')
                        ->orWhere('nome_fantasia', 'like', '%'.$search.'%')
                        ->paginate($paginate);
    }
}
