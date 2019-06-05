<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Corretiva extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table      = 'corretivas';

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


    //NÃO SEI SE É MAIS NECESSÁRIO ESSE BLOCO DE CÓDIGO

    /* public static function listarJoinCorretivaEquipamentoFuncionario($paginate)
    {
        return Corretiva::join('equipamentos', 'equipamentos.id', 'corretivas.equipamento_id')
                        ->join('funcionarios', 'funcionarios.id', 'corretivas.funcionario_id')
                        ->select('corretivas.*', 'funcionarios.*', 'equipamentos.*', 
                                'funcionarios.nome as f_nome',
                                'equipamentos.serial as e_serial',
                                'corretivas.nome as c_nome','corretivas.funcionario_id as c_funcionario_id',
                                'corretivas.equipamento_id as c_equipamento_id', 'corretivas.id as c_id',
                                'corretivas.created_at as c_created_at')
                        ->orderBy('corretivas.created_at', 'DESC')
                        ->paginate($paginate);
    }
 */

 
    public static function listarTodos($paginate)
    {
        return Corretiva::orderBy('created_at', 'DESC')->paginate($paginate);
    }

    
    public static function buscarCorretivaCadastrada($search, $paginate)
    {
        return Corretiva::join('corretivas', 'corretivas.equipamento_id', 'equipamentos.id')
                        ->where('corretivas.nome', 'like', '%'.$search.'%')
                        ->orWhere('corretivas.data', 'like', '%'.$search.'%')
                        ->orWhere('corretivas.descricao', 'like', '%'.$search.'%')
                        ->orWhere('corretivas.serial', 'like', '%'.$search.'%')
                        ->paginate($paginate);
    }
}
