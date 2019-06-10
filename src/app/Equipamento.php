<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipamento extends Model
{
    use SoftDeletes;

    protected $primarykey = 'id';
    protected $table = 'equipamentos';

    protected $fillable = [
        'fabrica',
        'modelo',
        'serial',
        'ano',
        'onibus_id',
        'funcionario_id',
    ];

    protected $hidden     = [
         
    ];

    public function onibus()
    {
        return $this->belongsTo(Onibus::class);
    }





    public static function listarJoinEquipamentoOnibus($paginate)
    {
        return Onibus::join('equipamentos', 'equipamentos.onibus_id', 'onibus.id')
                        ->orderBy('equipamentos.created_at', 'DESC')
                        ->paginate($paginate);
    }

    
    public static function buscarEquipamentoCadastrado($search, $paginate)
    {
        return Onibus::join('equipamentos', 'equipamentos.onibus_id', 'onibus.id')
                        ->where('equipamentos.fabrica', 'like', '%'.$search.'%')
                        ->orWhere('equipamentos.modelo', 'like', '%'.$search.'%')
                        ->orWhere('equipamentos.serial', 'like', '%'.$search.'%')
                        ->orWhere('equipamentos.ano', 'like', '%'.$search.'%')
                        ->orWhere('onibus.placa', 'like', '%'.$search.'%')
                        ->paginate($paginate);
    }

}
