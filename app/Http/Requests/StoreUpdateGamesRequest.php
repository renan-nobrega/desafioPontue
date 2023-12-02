<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateGamesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'titulo' => [
                'required',
                'unique:games',
                'min:1',
                'max:255'
            ],
            'genero' => [
                'required',
                'min:1',
                'max:255'
            ],
            'plataforma' => [
                'required',
                'min:1',
                'max:255'
            ],
            'valor' => [
                'required',
                'min:1',
                'max:100'
            ]
         ];
         if($this->method() == 'PATCH'){
            $rules['titulo'] = [
                'nullable',
                'min:1',
                'max:255',
                Rule::unique('games')->ignore($this->id),
            ];
            $rules['genero'] = [
                'nullable',
                'min:1',
                'max:255' 
            ];
            $rules['plataforma'] = [
                'nullable',
                'min:1',
                'max:255' 
            ];
            $rules['valor'] = [
                'nullable',
                'min:1',
                'max:255' 
            ];
         }        
        return $rules;
    }
}
