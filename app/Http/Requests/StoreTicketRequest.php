<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'message' => 'required|max:500'
        ];
    }

    public function messages(): array {
        return [
         'title.required' => 'Ticket needs a title',
         'message.required' => 'Ticket needs some text'
        ];
     }

}
