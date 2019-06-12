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
            'nome'                  => 'required',
            'data'                  => 'required',
            'descricao'             => 'required',
            'nao_conformidade_id'   => 'required',
            'equipamento_id'        => 'required',
            'setor_id'              => 'required',
            'funcionario_id'        => 'required,' . $this->imediata,
        ];
    }

    public function messages()
    {
        return [
            'nome.required'         =>  'Preenchimento do NOME é obrigatório.',

            'data.required'         =>  'Preenchimento da DATA é obrigatório.',

            'descricao.required'    =>  'Preenchimento da DESCRIÇÃO é obrigatório.',

            'nao_conformidade_id'   =>  'Selecione a Não Conformidade.',

            'equipamento_id'        =>  'Selecione o Equipamento.',

            'setor_id'              =>  'Selecione um Setor.',
        ];
    }
}
