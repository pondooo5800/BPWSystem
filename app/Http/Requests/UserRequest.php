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
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
            'name' => 'required',
            'email' => 'required',
            'tel' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'กรุณากรอกชื่อบัญชีผู้ใช้งาน/เลขประจำตัว',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'name.required' => 'กรุณากรอกชื่อ - นามสกุล',
            'email.required' => 'กรุณากรอกอีเมล',
            'tel.required' => 'กรุณากรอกเบอร์โทรศัพท์ที่เป็นตัวเลขเท่านั้น',
        ];
    }
}
