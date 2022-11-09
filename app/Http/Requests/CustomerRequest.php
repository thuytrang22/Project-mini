<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'phone_number' => 'required|min:10|max:12'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập tên',
            'email.required' => 'Bạn phải nhập email',
            'email.unique' => 'Email này đã tồn tại',
            'phone_number.required' => 'Bạn phải nhập số điện thoại',
            'phone_number.min' => 'Số điện thoại không được ít hơn 10 kí tự',
            'phone_number.max' => 'Số điện thoại không được vượt quá 12 kí tự',
        ];
    }
}
