<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NaoConformidadeStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nome'              => 'required',
            'data'              => 'required',
            'descricao'         => 'required',
            'equipamento_id'    => '',
            'setor_id'          =>  '',
            'funcionario_id'    => 'required,' . $this->imediata,
        ];
    }

    public function messages()
    {
        return [
            'nome.required'         =>  'Preenchimento do NOME é obrigatório.',

            'data.required'         =>  'Preenchimento da DATA é obrigatório.',

            'descricao.required'    =>  'Preenchimento da DESCRIÇÃO é obrigatório.',
        ];
    }
}
