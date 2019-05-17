<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $primarykey = 'id';
    protected $table = 'equipamentos';

    protected $fillable = [
        'fabrica',
        'modelo',
        'serial',
        'ano',
        'funcionario_id',
    ];

    protected $hidden     = [
         
    ];


    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function onibus()
    {
        return $this->belongsTo(Onibus::class);
    }

}
