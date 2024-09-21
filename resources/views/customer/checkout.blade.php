@extends('customer.main')
@section('insertView')
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
?>
<div class="container">
    <h3>Thanh toán đơn hàng {{$order->ordercode}} </h3>
    <h5>Đọc và xác nhận thông tin thanh toán (Đây là chức năng test, vui lòng không thực hiện chuyển tiền thật dưới mọi
        hình thức, chúng tôi sẽ không chịu
        trách nhiệm nếu bạn bỏ qua thông báo này): </h5>
    <div class="table-responsive">
        <form action="/vnpay_php/vnpay_create_payment.php" id="create_form" method="post">

            <div class="form-group">
                <input name="order_type" type="hidden" value="billpayment">
            </div>
            <div class="form-group">
                <input class="form-control" id="order_id" name="order_id" type="hidden"
                    value="<?php echo date("YmdHis") ?>" />
            </div>
            <div class="form-group">
                <label for="amount">Số tiền (VND)</label>
                <input class="form-control" name="amount" type="number" value="{{($order->total)}}" readonly>
            </div>
            <div class="form-group">
                <label for="order_desc">Nội dung thanh toán</label>
                <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2"
                    readonly>{{$order->ordercode}}</textarea>
            </div>
            <div class="form-group">
                <input name="bank_code" value="" type="hidden">
            </div>
            <div class="form-group">
                <input type="hidden" value="vn" name="language">
            </div>
            <div class="form-group">
                <input class="form-control" id="txtexpire" name="txtexpire" type="hidden"
                    value="<?php echo $expire; ?>" />
            </div>
            <div class="form-group">
                <label>Họ tên (*)</label>
                <input class="form-control" id="txt_billing_fullname" name="txt_billing_fullname" type="text"
                    value="{{$order->receivername}}" readonly />
            </div>
            <div class="form-group">
                <label>Email (*)</label>
                <input class="form-control" id="txt_billing_email" name="txt_billing_email" type="text"
                    value="{{Auth::user()->email}}" readonly />
            </div>
            <div class="form-group">
                <label>Số điện thoại (*)</label>
                <input class="form-control" id="txt_billing_mobile" name="txt_billing_mobile" type="text"
                    value="{{$order->receiverphone}}" readonly />
            </div>
            <div class="form-group">
                <label>Địa chỉ giao hàng (*)</label>
                <input class="form-control" id="txt_billing_addr1" name="txt_billing_addr1" type="text"
                    value="{{$order->shipaddress}}" readonly />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_postalcode" name="txt_postalcode" type="hidden" value="0" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_bill_city" name="txt_bill_city" type="hidden" value="Hồ Chí Minh" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_bill_state" name="txt_bill_state" type="hidden" value="" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_bill_country" name="txt_bill_country" type="hidden" value="VN" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_ship_fullname" name="txt_ship_fullname" type="hidden"
                    value="PureHealthTT" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_ship_email" name="txt_ship_email" type="hidden"
                    value="purehealthtt@gmail.com" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_ship_mobile" name="txt_ship_mobile" type="hidden"
                    value="0866860918" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_ship_addr1" name="txt_ship_addr1" type="hidden" value="None" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_ship_postalcode" name="txt_ship_postalcode" type="hidden"
                    value="" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_ship_city" name="txt_ship_city" type="hidden" value="" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_ship_state" name="txt_ship_state" type="hidden" value="" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_ship_country" name="txt_ship_country" type="hidden" value="VN" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_inv_customer" name="txt_inv_customer" type="hidden"
                    value="{{$order->receivername}}" readonly />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_inv_company" name="txt_inv_company" type="hidden" value="Không" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_inv_addr1" name="txt_inv_addr1" type="hidden" value="Không" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_inv_taxcode" name="txt_inv_taxcode" type="hidden" value="0" />
            </div>
            <div class="form-group">
                <input type="hidden" name="cbo_inv_type" value="I">
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_inv_email" name="txt_inv_email" type="hidden"
                    value="{{Auth::user()->email}}" />
            </div>
            <div class="form-group">
                <input class="form-control" id="txt_inv_mobile" name="txt_inv_mobile" type="hidden"
                    value="{{$order->receiverphone}}" />
            </div>
            <button style="margin-bottom: 20px;" type="submit" name="redirect" id="redirect"
                class="btn btn-primary">Chuyển đến thanh toán</button>
        </form>
    </div>
</div>
@endsection