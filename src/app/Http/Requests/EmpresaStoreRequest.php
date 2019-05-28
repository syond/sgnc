<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaStoreRequest extends FormRequest
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
            'cnpj'              => 'required|cnpj|unique:empresas,cnpj,' . $this->empresa,
            'nome_fantasia'     => 'required|max:50',
            'razao_social'      => 'required|max:50',
            'funcionario_id'    => 'required,' . $this->empresa,
        ];
    }

    public function messages()
    {
        return [
            'cnpj.required'             =>  'Preenchimento do CNPJ é obrigatório.',
            'cnpj.unique'               =>  'CNPJ já existe!',

            'nome_fantasia.required'    =>  'Preenchimento do NOME FANTASIA é obrigatório.',
            'nome_fantasia.max'         =>  'NOME FANTASIA muito longo!',
            
            'razao_social.required'     =>  'Email já cadastrado!',      
            'razao_social.max'         =>  'NOME FANTASIA muito longo!',
        ];
    }    
}
