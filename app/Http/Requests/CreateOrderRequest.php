<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'district' => 'required',
            'subDistrict' => 'required',
            'extraAddress' => 'required|min:6',
            'receivername' => 'required|min:10',
            'receiverphone' => 'required|regex:/^0[0-9]{9}$/|digits:10',
        ];
    }

    public function messages()
    {
        return [
            "district.required" => 'Thiếu thông tin quận trong địa chỉ giao hàng',
            'subDistrict.required' => 'Thiếu thông tin phường trong địa chỉ giao hàng',
            'extraAddress.required' => 'Thiếu thông tin số nhà và đường trong địa chỉ giao hàng',
            'extraAddress.min' => 'Thông tin số nhà quá ngắn',
            'receivername.required' => 'Không tìm thấy thông tin tên người nhận',
            'receivername.min' => "Tên người nhận quá ngắn",
            'receiverphone.required' => 'Vui lòng nhập số điện thoại.',
            'receiverphone.regex' => 'Số điện thoại không hợp lệ.',
            'receiverphone.digits' => 'Số điện thoại phải chứa 10 chữ số.',
        ];
    }
}
