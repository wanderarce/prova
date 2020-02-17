<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaRequest extends FormRequest
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
            'cliente_id' => 'required|max:100',
            'telefone' => 'required|max:13',
            'recarga'=> 'required|max:10',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'recarga.required' => 'Recarga é obrigatório',
            'telefone.required'  => 'Telefone é obrigatório',
            'cliente_id.required' => 'Cliente é obrigatório'
        ];
    }
}
