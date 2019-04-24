<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'product_id' => 'required',
            'sell_code' => 'required',
            'sell_name' => 'required',
            'sell_stock' => 'required',
            'sell_price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'กรุณาเลือกรหัสสินค้า',
            'sell_code.required' => 'กรุณาเลือกโค้ดสินค้า',
            'sell_name.required' => 'กรุณาเลือกชื่อสินค้า',
            'sell_stock.required' => 'กรุณากรอกจำนวนสินค้า',
            'sell_price.required' => 'กรุณากรอกราคาสินค้า',
        ];
    }
}
