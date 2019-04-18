<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'code' => 'required',
            'ctrgory_id' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณากรอกชื่อสินค้า',
            'code.required' => 'กรุณากรอกโค้ดสินค้า',
            'ctrgory_id.required' => 'กรุณาเลือกประเภทสินค้า',
            'stock.required' => 'กรุณากรอกจำนวนสินค้า',
            'stock.numeric' => 'กรุณากรอกจำนวนสินค้าที่เป็นตัวเลขเท่านั้น',
            'price.required' => 'กรุณากรอกราคาสินค้า',
            'price.numeric' => 'กรุณากรอกราคาที่เป็นตัวเลขเท่านั้น',


        ];
    }
}
