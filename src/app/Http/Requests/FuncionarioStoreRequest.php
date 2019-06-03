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
     * Regras de validação dos campos
     *
     * @return array
     */
    public function rules()
    {
        return [
            'matricula'     =>  'required|numeric|unique:funcionarios,matricula,' . $this->funcionario,
            'password'      =>  'required|min:6|max:8,' . $this->funcionario,
            'nome'          =>  'required|min:3',
            'email'         =>  'required|email',
            'foto'          =>  'nullable',
            'nivel'         =>  'required',
            'setor_id'      =>  '',
            'empresa_id'    =>  '',
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
     * Mensagens customizadas para validação
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required'         =>  'Preenchimento do NOME é obrigatório.',
            'nome.min'              =>  'Insira um nome válido.',
            
            'email.required'        =>  'Preenchimento do EMAIL é obrigatório.',
            'email.email'           =>  'Insira um email válido.',
            'email.unique'          =>  'Email já cadastrado!',
            
            'matricula.required'    =>  'Preenchimento da MATRÍCULA é obrigatório.',
            'matricula.unique'      =>  'Matrícula já cadastrada!',
            'matricula.numeric'     =>  'Preencha o campo SOMENTE com NÚMEROS.',
            
            'password.required'     =>  'Preenchimento da SENHA é obrigatório.',
            'password.min'          =>  'A senha deve conter no MÍNIMO 6 e no MÁXIMO 8 caracteres',
            'password.max'          =>  'A senha deve conter no MÍNIMO 6 e no MÁXIMO 8 caracteres',
            
            'nivel.required'        =>  'Selecione um nível de acesso para esse usuário.',
        ];
    }
    
}
