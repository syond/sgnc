<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImediataStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nome'              => 'required|max:50',
            'data'              => 'required',
            'descricao'         => 'required',
            'equipamento_id'    => '',
            'funcionario_id'    => 'required,' . $this->imediata,
        ];
    }

    public function messages()
    {
        return [
            'nome.required'         =>  'Preenchimento do NOME é obrigatório.',
            'nome.max'              =>  'NOME muito longo.',

            'data.required'         =>  'Preenchimento da DATA é obrigatório.',

            'descricao.required'    =>  'Preenchimento da DESCRIÇÃO é obrigatório.',
        ];
    }
}
