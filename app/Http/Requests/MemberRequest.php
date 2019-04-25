<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'code' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'time_total' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'กรุณากรอกรหัสประจำตันักเรียน',
            'name.required' => 'กรุณากรอกชื่อ - นามสกุล',
            'gender.required' => 'กรุณาเลือกเพศ',
            'time_total.required' => 'กรุณากรอกจำนวนครั้ง',
        ];
    }
}
