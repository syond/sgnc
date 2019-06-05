<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RncStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'descricao'         => 'required',
            'empresa_id'        => '',
            'setor_id'          => '',
            'onibus_id'         => '',
            'equipamento_id'    => '',
            'nao_conformidade_id'  => '',
            'imediata_id'       => '',
            'corretiva_id'      => '',
            'funcionario_id'    => 'required,' . $this->imediata,
        ];
    }

    public function messages()
    {
        return [
            
            'descricao.required'    =>  'Preenchimento da DESCRIÇÃO é obrigatório.',
        ];
    }
}
