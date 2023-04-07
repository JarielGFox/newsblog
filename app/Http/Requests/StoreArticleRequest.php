<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:150',
            'description' => 'required|max:5000',
            'author' => 'required|max:75'
        ];
    }

    public function messages(): array {
       return [
        'title.required' => 'Devi inserire un titolo che non superi i 150 caratteri.',
        'author.required' => 'Non puoi inserire un post anonimo',
        'description.required' => 'Magari scriviamo un articolo, prima, che dici?'
       ];
    }


}
