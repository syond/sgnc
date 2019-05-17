<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamentoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fabrica'           => 'required|max:50',
            'modelo'            => 'required|max:50',
            'serial'            => 'required|max:50|unique:equipamentos',
            'ano'               => 'required|numeric',
            'funcionario_id'    => '',
        ];
    }

    public function messages()
    {
        return [
            'fabrica.required'  =>  'Preenchimento da FABRICA é obrigatório.',
            'modelo.required'   =>  'Preenchimento do MODELO é obrigatório.',
            
            'serial.required'   =>  'Preenchimento do SERIAL é obrigatório.',
            'serial.unique'     =>  'Serial já cadastrado!',
            
            'ano.required'      =>  'Preenchimento do ANO é obrigatório.',    
        ];
    }
}
