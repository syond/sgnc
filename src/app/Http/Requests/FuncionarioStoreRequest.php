<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioStoreRequest extends FormRequest
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
            'matricula' =>  'required|numeric|unique:funcionarios',
            'senha'     =>  'required|min:6|max:8',
            'nome'      =>  'required|max:30',
            'email'     =>  'required|max:50',
            'foto'      =>  'nullable'
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //'email'   =>  'trim|lowercase',
            //'name'    =>  'trim|capitalize|escape'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required'         =>  'Preenchimento do NOME é obrigatório.',
            
            'email.required'        =>  'Preenchimento do EMAIL é obrigatório.',
            'email.unique'          =>  'Email já cadastrado!',
            
            'matricula.required'    =>  'Preenchimento da MATRÍCULA é obrigatório.',
            'matricula.unique'      =>  'Matrícula já cadastrado!',
            
            'senha.required'        =>  'Preenchimento da SENHA é obrigatório.',            
        ];
    }
    
}
