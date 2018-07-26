<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacaoFormRequest extends FormRequest
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
            'name' => 'required|min:10|max:100',
            'email' => 'required|email',
            'data' => 'date|required',
            'telefone' => 'Digits:9',
            'codigo_postal' => 'required'
        ];
    }
    
//    public function messages()
//    {
//        return [
//            'name.required' => 'O campo nome é de preenchemento obrigatorio',
////            'name.alpha' => 'O campo nome só deve ter letras',
//            'name.min' => 'O campo nome deve ter no minimo 10 letras',
//            'name.max' => 'O campo nome deve ter no maximo 100 letras',
//            'data.required' => 'O campo data é obrigatorio',
//        ];
//    }
}
