<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'nome' => 'required|min:3',
            'qtd_temporadas' => 'required',
            'qtd_episodios' => 'required'
        ];
    }

    public function messages () 
    {
        return [
            'nome.required' => ' O campo nome é obrigatório',
            'nome.min' => 'O campo nome precisa ter pelo menos três caracteres',
            'qtd_temporadas.required' => 'O campo temporadas não pode ficar em branco',
            'qtd_episodios.required' => 'O campo episodio não pode ficar em branco'
        ];
    }
}
