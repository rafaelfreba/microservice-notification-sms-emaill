<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'subject' => ['required', 'string', 'min:4', 'max: 50'],
            'name' => ['required', 'string', 'min:3', 'max: 50'],
            'email' => ['required', 'string', 'email'],
            'message' => ['required','string','min:3','max:255']
        ];
    }

    public function attributes()
    {
        return [
            'subject' => 'assunto',
            'name' => 'nome',
            'email' => 'e-mail',
            'message' => 'mensagem'
        ];
    }
}
