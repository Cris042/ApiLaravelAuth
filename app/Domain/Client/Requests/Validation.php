<?php

namespace SAASBoilerplate\Domain\Client\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LaravelLegends\PtBrValidator\Rules\FormatoCpf;
use Illuminate\Http\Request;

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
           'name' => [ 'required' , 'min:2' , 'max:160', 'unique:client' ],
           'cpf' => [  new FormatoCpf , 'unique:client', ],
           'telephone' => [ 'required' , 'telefone_com_ddd' ] 
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>  'O nome e obrigatorio.',
            'name.min' => 'Não e permetidos nomes com menos de 2 caracter.',
            'name.max' => 'Não e permetidos nomes com mais de 160 caracter.',
            'name.unique' => 'Não e permetidos nomes repedido.',
        ];
    }
}
