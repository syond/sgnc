<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imediata extends Model
{

    protected $primaryKey = 'id';
    protected $table      = 'imediatas';

    protected $fillable   = [
        'nome',
        'descricao',
        'funcionario_id',
        'equipamento_id',
        'nao_conformidade_id',
    ];

    protected $hidden     = [
        //
    ];

    /**
     * Relacionamentos BelongsTo
     */
    public function nao_conformidade()
    {
        return $this->belongsTo(NaoConformidade::class);
    }
    
    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }

    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function corretiva()
    {
        return $this->hasOne(Corretiva::class);
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

}
