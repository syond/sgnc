<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Onibus;

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
            'placa'             => 'required|max:8|unique:onibus,placa,' . $this->onibus,
            'chassi'            => 'required|max:17|unique:onibus,chassi,' . $this->onibus,
            'numero'            => 'required|unique:onibus,numero,' . $this->onibus,
            'ano'               => 'required|numeric',
            'empresa_id'        => 'required',
            'funcionario_id'    => 'required,' . $this->onibus,
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

            'modelo.max'      =>  'MODELO inválido!',
            'placa.max'       =>  'PLACA inválida!',
            'chassi.max'      =>  'CHASSI inválido!',

            'numero.numeric'    => 'O campo NUMERO deve conter apenas números!',
            'ano.numeric'       => 'O campo ANO deve conter apenas números!',

            'placa.unique'      =>  'PLACA já cadastrada!',
            'chassi.unique'     =>  'CHASSI já cadastrado!',
            'numero.unique'     =>  'NUMERO já cadastrado!',           
        ];
    }
}
