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
            'txt_nome'=>'required|max:30',
            'txt_email'=> 'required|max:50',
            'txt_matricula' => 'required|numeric',
            'txt_senha'=>'required|min:6|max:8',
            'txt_foto' => 'nullable'
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
            //'email' => 'trim|lowercase',
            //'name' => 'trim|capitalize|escape'
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
            'txt_nome.required' => 'Preenchimento do NOME é obrigatório.',
            'txt_email.required' => 'Preenchimento do EMAIL é obrigatório.',
            'txt_matricula.required' => 'Preenchimento da MATRÍCULA é obrigatório.',
            'txt_senha.required' => 'Preenchimento da SENHA é obrigatório.',            
        ];
    }
    
}
