<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'email' => 'required|email',
            'website' => ['regex:/^(www\.)+([a-z0-9]*)+(\.)+([a-z0-9]*)/'],
            'logo' => 'image',
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
