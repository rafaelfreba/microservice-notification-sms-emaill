<?php

namespace App\Http\Requests;

use App\Rules\SmsRule;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class SmsRequest extends FormRequest
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
            'cellNumber' => ['required','string','min: 11', 'max: 11', new SmsRule],
            'message' => ['required','string','min:3','max:160']
        ];
    }

    public function attributes()
    {
        return [
            'cellNumber' => 'numero de celular',
            'message' => 'mensagem'
        ];
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'cellNumber' => Str::replace([' ', '.', ',', '-', '/', '(', ')'],'',$this->cellNumber)
        ]);   
    }
}
