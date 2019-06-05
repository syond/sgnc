<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rnc extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table      = 'rnc';

    protected $fillable   = [
        'descricao',
        'empresa_id',
        'setor_id',
        'onibus_id',
        'equipamento_id',
        'nao_conformidade_id',
        'imediata_id',
        'corretiva_id',
        'funcionario_id',
        
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

    public function onibus()
    {
        return $this->belongsTo(Onibus::class);
    }

    public function naoconformidade()
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
