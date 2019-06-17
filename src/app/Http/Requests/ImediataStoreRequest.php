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
            'descricao'             => 'required',
            'nao_conformidade_id'   => 'required',
            'funcionario_id'        => 'required,' . $this->imediata,
        ];
    }

    public function messages()
    {
        return [
            'nome.required'                 =>  'Preenchimento do NOME é obrigatório.',

            'descricao.required'            =>  'Preenchimento da DESCRIÇÃO é obrigatório.',

            'nao_conformidade_id.required'  =>  'Selecione a Não Conformidade.',
            'nao_conformidade_id.unique'    =>  'Ação Imediata já cadastrada nessa Não Conformidade.',

            'equipamento_id.required'       =>  'Selecione o Equipamento.',

            'setor_id.required'             =>  'Selecione um Setor.',
        ];
    }
}
