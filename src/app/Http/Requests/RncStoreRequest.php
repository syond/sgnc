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
            'setor_id'          => 'required',
            'de_data'           => 'required',
            'ate_data'          => 'required',
            'ativo'             => '',
            'funcionario_id'    => 'required,' . $this->imediata,
        ];
    }

    public function messages()
    {
        return [
            
            'descricao.required'    =>  'Preenchimento da DESCRIÇÃO é obrigatório.',

            'setor.required'        =>  'Selecione o Setor.',

            'de_data.required'      => 'Preencha a data inicial.',

            'ate_data.required'     => 'Preencha a data final.',
        ];
    }
}
