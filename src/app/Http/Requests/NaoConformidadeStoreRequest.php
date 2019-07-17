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
            'descricao'         => 'required',
            'equipamento_id'    => 'required',
            'setor_id'          => 'required',
            'funcionario_id'    => 'required,' . $this->imediata,
        ];
    }

    public function messages()
    {
        return [
            'nome.required'         =>  'Preenchimento do NOME é obrigatório.',

            'descricao.required'    =>  'Preenchimento da DESCRIÇÃO é obrigatório.',

            'equipamento_id.required'    =>  'Selecione um Equipamento.',

            'setor_id.required'     =>  'Selecione um Setor.',
        ];
    }
}
