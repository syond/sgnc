<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetorStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nome'              => 'required|max:50|unique:setores,nome,' . $this->setor,
            'empresa_id'        => 'required',
            'funcionario_id'    => 'required,' . $this->setor,
        ];
    }

    public function messages()
    {
        return [
            'nome.required' =>  'Preenchimento da FABRICA é obrigatório.',
            'nome.max'      =>  'NOME muito longo.'
        ];
    }
}
