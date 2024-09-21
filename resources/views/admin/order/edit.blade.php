@extends('admin.main')
@section('insertView')
<form action="/edit-order" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Ghi chú:</label>
                    <input class="form-control" type="text" name="note" value="{{$order->note}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Đơn vị</label>
                    <select name="statuscode" class="form-control" name="typecode">
                        @foreach($orderStatus as $status)
                        <option {{$order->statuscode == $status->statuscode ? "selected" : ""}} value="{{ $status->statuscode }}">{{ $status->description }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class=" col-md-12 btn btn-primary">Cập nhật đơn hàng</button>
    </div>
    <input type="hidden" name="ordercode" value="{{$order->ordercode}}">
    @csrf
</form>
@endsection