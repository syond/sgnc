<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Input;

class Rnc extends Model
{

    protected $primaryKey = 'id';
    protected $table      = 'rnc';

    protected $fillable   = [
        'descricao',
        'empresa_id',
        'setor_id',
        'funcionario_id',
        'de_data',
        'ate_data',
        
    ];

    protected $hidden     = [
        //
    ];

    
    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }

    public function onibus()
    {
        return $this->belongsTo(Onibus::class);
    }

    public function naoConformidade()
    {
        return $this->belongsTo(NaoConformidade::class);
    }

    public function imediata()
    {
        return $this->belongsTo(Imediata::class);
    }

    public function corretiva()
    {
        return $this->belongsTo(Corretiva::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }


    public static function listarTodos($paginate)
    {
        return Rnc::orderBy('created_at', 'DESC')->paginate($paginate);
    }

    
    /* public static function buscarCorretivaCadastrada($search, $paginate)
    {
        return NaoConformidade::join('nao_conformidades', 'corretivas.equipamento_id', 'equipamentos.id')
                        ->where('nao_conformidades.nome', 'like', '%'.$search.'%')
                        ->orWhere('nao_conformidades.data', 'like', '%'.$search.'%')
                        ->orWhere('nao_conformidades.descricao', 'like', '%'.$search.'%')
                        ->orWhere('nao_conformidades.serial', 'like', '%'.$search.'%')
                        ->paginate($paginate);
    } */
}
