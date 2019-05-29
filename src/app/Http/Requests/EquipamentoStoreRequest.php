<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamentoStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'fabrica'           => 'required|max:50',
            'modelo'            => 'required|max:50',
            'serial'            => 'required|max:50|unique:equipamentos,serial,' . $this->equipamento,
            'ano'               => 'required|numeric',
            'onibus_id'         => '',
            'funcionario_id'    => 'required,' . $this->equipamento,
        ];
    }

    public function messages()
    {
        return [
            'fabrica.required'  =>  'Preenchimento da FABRICA é obrigatório.',
            'modelo.required'   =>  'Preenchimento do MODELO é obrigatório.',

            'fabrica.max'       =>  'FABRICA muito longo.',
            'modelo.max'        =>  'MODELO muito longo.',
            'serial.max'        =>  'SERIAL muito longo.',
            
            'serial.required'   =>  'Preenchimento do SERIAL é obrigatório.',
            'serial.unique'     =>  'Serial já cadastrado!',
            
            'ano.required'      =>  'Preenchimento do ANO é obrigatório.',    
            'ano.numeric'       =>  'O campo ANO deve conter apenas números!',
        ];
    }
}
