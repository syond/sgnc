<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imediata extends Model
{
    protected $primaryKey = 'id';
    protected $table      = 'imediatas';

    protected $fillable   = [
        'nome',
        'data',
        'descricao',
        'equipamento_id',
        'funcionario_id',
        'status',
    ];

    protected $hidden     = [
        //
    ];

    
    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }


    public static function listarJoinImediataEquipamento($paginate)
    {
        return Equipamento::join('imediatas', 'imediatas.equipamento_id', 'equipamentos.id')->paginate($paginate);
    }

    
    public static function buscarImediataCadastrada($search, $paginate)
    {
        return Equipamento::join('imediatas', 'imediatas.equipamento_id', 'equipamentos.id')
                        ->where('imediatas.nome', 'like', '%'.$search.'%')
                        ->orWhere('imediatas.data', 'like', '%'.$search.'%')
                        ->orWhere('imediatas.descricao', 'like', '%'.$search.'%')
                        ->orWhere('equipamentos.serial', 'like', '%'.$search.'%')
                        ->paginate($paginate);
    }


    public static function listarImediatasPendentes()
    {
        return Imediata::where('status', 0)->get();
    }


    public static function listarImediatasEmAndamento()
    {
        return Imediata::where('status', 1)->get();
    }


    public static function listarImediatasEncerradas()
    {
        return Imediata::where('status', 2)->get();
    }

}
