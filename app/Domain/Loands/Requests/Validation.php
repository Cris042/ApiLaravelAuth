<?php

namespace SAASBoilerplate\Domain\Loands\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Validation extends FormRequest
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
           'amount' => [ 'required' , 'integer', 'min:1' ],
           'expires_at' => [ 'required' ],
        ];
    }

    public function messages()
    {
        return [
            'expires_ate.required' =>  'A data de entrega e obrigatorio.',
            
            'amount.required' => 'A quantidade em estoque e obrigatoria.',
            'amount.min' => 'Não e permetidos estoque inferior a 1.',
            'amount.integer' => 'Nâo e permetidos caracteres numericos no campo quantidade.',
        ];
    }
}
