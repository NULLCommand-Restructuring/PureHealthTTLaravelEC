<?php

namespace App\Services;

use App\Models\Order;

class CheckoutService
{
    public function checkHash($request)
    {
        $vnp_SecureHash = $request->input('vnp_SecureHash');
        $vnp_HashSecret = "TIMDJWMUEHCOZYWDZHZWFPQSORIBDNWF";

        $inputData = [];
        foreach ($request->input() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash == $vnp_SecureHash) return true;
        return false;
    }

    public function handleStatusOrder($request)
    {
        $order = Order::where('ordercode', $request->input('vnp_OrderInfo'))->first();
        if ($order) {
            if ($request->input('vnp_ResponseCode') == '00') {
                try {
                    $order->update(['statuscode' => 'OS3']);
                    return "Thanh toán thành công";
                } catch (\Exception $err) {
                    return 'Cập nhật thanh toán thất bại. Lý do: ' . $err->getMessage();
                }
            }
            return "Thanh toán thất bại. Lý do: Giao dịch không thành công, vui lòng kiểm tra lại";
        }
        return "Thanh toán thất bại. Lý do: không tìm thấy thông tin đơn hàng";
    }
}
