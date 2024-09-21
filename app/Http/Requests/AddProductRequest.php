<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'productname' => 'required|min:10',
            'typecode' => 'required',
            'price' => 'required',
            'discount' => [
                'required',
                'numeric',
                'min:0',
                'max:100'
            ],
            'unitcode' => 'required',
            'shortdescription' => 'required|min:15',
            'description' => 'required|min:20',
            'picturelink' => 'required',
            'active' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'productname.required' => 'Vui lòng nhập tên sản phẩm',
            'productname.min' => 'Tên sản phẩm phải có độ dài tối thiểu :min kí tự',

            'typecode.required' => 'Vui lòng chọn loại sản phẩm',
            'unitcode.required' => 'Vui lòng chọn đơn vị sản phẩm',

            'price.required' => 'Vui lòng nhập giá sản phẩm',

            'discount.required' => 'Vui lòng nhập giá trị chiết khấu',
            'discount.numeric' => 'Giá trị chiết khấu phải là số',
            'discount.min' => 'Giá trị chiết khấu tối thiểu là :min',
            'discount.max' => 'Giá trị chiết khấu tối đa là :max',

            'shortdescription.required' => 'Vui lòng nhập mô tả ngắn',
            'shortdescription.min' => 'Mô tả ngắn phải có độ dài tối thiểu :min kí tự',

            'description.required' => 'Vui lòng nhập mô tả chi tiết',
            'description.min' => 'Mô tả chi tiết phải có độ dài tối thiểu :min kí tự',

            'picturelink.required' => 'Vui lòng chọn hình ảnh sản phẩm',

            'active.required' => 'Vui lòng chọn trạng thái sản phẩm'
        ];
    }
}
