<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NaoConformidade extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table      = 'nao_conformidades';

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

    
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

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


    public function imediatas()
    {
        return $this->hasMany('App\Imediata');
    }

    /* public static function listarJoinNaoConformidadeEquipamentoFuncionario($paginate)
    {
        return NaoConformidade::join('equipamentos', 'equipamentos.id', 'nao_conformidades.equipamento_id')
                        ->join('funcionarios', 'funcionarios.id', 'nao_conformidades.funcionario_id')
                        ->select('nao_conformidades.*', 'funcionarios.*', 'equipamentos.*', 
                                'funcionarios.nome as f_nome',
                                'equipamentos.serial as e_serial',
                                'nao_conformidades.nome as c_nome','nao_conformidades.funcionario_id as c_funcionario_id',
                                'nao_conformidades.equipamento_id as c_equipamento_id', 'nao_conformidades.id as c_id',
                                'nao_conformidades.created_at as c_created_at')
                        ->orderBy('nao_conformidades.created_at', 'DESC')
                        ->paginate($paginate);
    } */


    public static function listarTodos($paginate)
    {
        return NaoConformidade::orderBy('created_at', 'DESC')->paginate($paginate);
    }

    
    public static function buscarCorretivaCadastrada($search, $paginate)
    {
        return NaoConformidade::join('nao_conformidades', 'corretivas.equipamento_id', 'equipamentos.id')
                        ->where('nao_conformidades.nome', 'like', '%'.$search.'%')
                        ->orWhere('nao_conformidades.data', 'like', '%'.$search.'%')
                        ->orWhere('nao_conformidades.descricao', 'like', '%'.$search.'%')
                        ->orWhere('nao_conformidades.serial', 'like', '%'.$search.'%')
                        ->paginate($paginate);
    }
}
