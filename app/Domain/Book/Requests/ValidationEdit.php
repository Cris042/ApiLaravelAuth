<?php

namespace SAASBoilerplate\Domain\Book\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidationEdit extends FormRequest
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
           'title' => [ 'required' , 'min:2' , 'max:160' ],
           'author' => [ 'required' , 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/', 'min:2' , 'max:100', ],
           'value' => [ 'required' , 'integer', 'min:1' ],
           'description' => [ 'required', 'min:2', 'max:512' ],
           'amount' => ['required' , 'integer', 'min:1' ]         
        ];
    }

    public function messages()
    {
        return [
            'title.required' =>  'O titulo e obrigatorio.',
            'title.min' => 'Não e permetidos titulos com menos de 2 caracter.',
            'title.max' => 'Não e permetidos titulos com mais de 160 caracter.',

            'author.required' => 'O autor e obrigatorio.',
            'author.min' => 'Não e permetidos nome de autor com menos de 2 caracter.',
            'author.max' => 'Não e permetidos nome de autor com mais de 100 caracter.',
            'author.regex' => 'Nâo e permetidos caracteres numericos no campo autor.',

            'value.required' =>  'O valor da locação e obrigatorio.',
            'value.min' => 'Não e permedidos nome de autor com menos de 2 caracter.',
            'value.integer' => 'So e permedido caracteres numericos no campo autor.',

            'description.required' => 'A descriçâo e obrigarotoria.',
            'description.min' => 'Não e permetidos descriçâo com menos de 2 caracter.',
            'description.max' => 'Não e permetidos descrição com mais de 512 caracter.',

            'amount.required' => 'A quantidade em estoque e obrigatoria.',
            'amount.min' => 'Não e permetidos estoque inferior a 1.',
            'amount.integer' => 'Nâo e permetidos caracteres numericos no campo quantidade.',
        ];
    }
}
