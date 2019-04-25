<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'product_name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'total' => 'required',
            'member_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'กรุณาเลือกชื่อสินค้า',
            'qty.required' => 'กรุณากรอกจำนวนสินค้า',
            'price.required' => 'กรุณากรอกราคาสินค้า',
            'total.required' => 'กรุณากรอกราคารวมทั้งหมด',
            'member_id.required' => 'กรุณาเลือกผู้ดำเนินการ',
        ];
    }
}
