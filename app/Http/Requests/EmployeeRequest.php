<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Esse campo deve ser preenchido',
            'email' => 'E-mail inválido, siga esse padrão \'exemplo@email.com\'',
            'website.regex' => 'Url inválida, digite nesse padrão \'www.meusite.com\'',
        ];
    }
}
