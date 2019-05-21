<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
