<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'full_name' => 'required|',
            'birthday' => 'required',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ];
    }
    public function validatedInputs()
    {
        $keys = array_keys($this->rules());

        return $this->only($keys);
    }
}