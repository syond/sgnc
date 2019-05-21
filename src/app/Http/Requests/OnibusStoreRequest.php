<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnibusStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'modelo'            => 'required|max:50',
            'placa'             => 'required|max:7|unique:onibus',
            'chassi'            => 'required|max:17|unique:onibus',
            'numero'            => 'required|numeric|unique:onibus',
            'ano'               => 'required|numeric',
            'empresa_id'        => 'required',
            'funcionario_id'    => '',
        ];
    }

    public function messages()
    {
        return [
            'modelo.required'   =>  'Preenchimento da MODELO é obrigatório.',
            'placa.required'    =>  'Preenchimento do PLACA é obrigatório.',
            'chassi.required'   =>  'Preenchimento do CHASSI é obrigatório.',
            'numero.required'   =>  'Preenchimento do NUMERO é obrigatório.',
            'ano.required'      =>  'Preenchimento do ANO é obrigatório.',

            'placa.unique'      =>  'PLACA já cadastrada!',
            'chassi.unique'     =>  'CHASSI já cadastrado!',
            'numero.unique'     =>  'NUMERO já cadastrado!',           
        ];
    }
}
