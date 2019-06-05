<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imediata extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table      = 'imediatas';

    protected $fillable   = [
        'nome',
        'data',
        'descricao',
        'equipamento_id',
        'funcionario_id',
        'setor_id',
    ];

    protected $hidden     = [
        //
    ];

    
    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class, 'equipamento_id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }


    public static function listarTodos($paginate)
    {
        return Imediata::orderBy('created_at', 'DESC')->paginate($paginate);
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
