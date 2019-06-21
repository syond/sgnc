<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CorretivaStoreRequest extends FormRequest
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
            'imediata_id'       => 'required|unique:corretivas,imediata_id,' . $this->corretivas,
            'equipamento_id'    => 'required',
            'setor_id'          => 'required',
            'funcionario_id'    => 'required,' . $this->corretiva,
        ];
    }

    public function messages()
    {
        return [
            'nome.required'             =>  'Preenchimento do NOME é obrigatório.',

            'descricao.required'        =>  'Preenchimento da DESCRIÇÃO é obrigatório.',


            'imediata_id.required'      =>  'Selecione uma Ação Imediata.',
            'imediata_id.unique'        =>  'Corretiva já cadastrada nessa Ação Imediata.',

        ];
    }
}
