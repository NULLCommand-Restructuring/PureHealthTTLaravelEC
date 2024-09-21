@extends('admin.main')
@section('insertView')
<table class="table">
    <thead>
        <tr>
            <th>Mã số</th>
            <th>Mã khách hàng</th>
            <th>Tên người nhận</th>
            <th>SĐT người nhận</th>
            <th>Địa chỉ nhận</th>
            <th>Ghi chú</th>
            <th style="width: 100px;">Tổng tiền (VND)</th>
            <th>Trạng thái</th>
            <th style="width: 100px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td><a href="/order-details/{{$order->ordercode}}">{{$order->ordercode}}</a></td>
            <td><a href="/user-details/{{$order->customercode}}">{{$order->customercode}}</a></td>
            <td>{{$order->receivername}}</td>
            <td>{{$order->receiverphone}}</td>
            <td>{{$order->shipaddress}}</td>
            <td>{{$order->note}}</td>
            <td>{{number_format($order->total)}}</td>
            @if($order->statuscode == 'OS1')
            <td><span style="background-color: blue;" class="btn btn-xs">WAIT</span></td>
            @elseif($order->statuscode == 'OS2')
            <td><span style="background-color: coral;" class="btn btn-xs">AUTH</span></td>
            @elseif($order->statuscode == 'OS3')
            <td><span style="background-color: blueviolet;" class="btn btn-xs">CHECKOUT</span></td>
            @elseif($order->statuscode == 'OS4')
            <td><span style="background-color: lime;" class="btn btn-xs">COMPLETE</span></td>
            @elseif($order->statuscode == 'OS5')
            <td><span style="background-color: red;" class="btn btn-xs">CANCEL</span></td>
            @endif
            <td>
                <a class="btn btn-primary btn-sm" href="/edit-order/{{$order->ordercode}}">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow('{{$order->ordercode}}', '/delete-order')">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('paginate')
<div style="display: flex; justify-content: space-between; margin-top: -10px;" class="pagination">
    <div class="ml-2 pagination__previous">
        {!! $orders->previousPageUrl() ? '<a href="'.$orders->previousPageUrl().'">👈 Trang trước</a>' : '' !!}
    </div>
    <div>
        <ul class="pagination__numbers" style="display: flex; list-style: none;">
            @php
            $currentPage = $orders->currentPage();
            $lastPage = $orders->lastPage();
            $startPage = max($currentPage - 2, 1);
            $endPage = min($currentPage + 2, $lastPage);
            @endphp

            @for ($page = $startPage; $page <= $endPage; $page++) <li
                class="{{ $page == $currentPage ? 'active' : '' }}" style="margin-right: 10px;">
                @if ($page == $currentPage)
                <span>{{ $page }}</span>
                @else
                <a href="{{ $orders->url($page) }}">{{ $page }}</a>
                @endif
                </li>
                @endfor
        </ul>
    </div>
    <div class="mr-2 pagination__next">
        {!! $orders->nextPageUrl() ? '<a href="'.$orders->nextPageUrl().'">Trang tiếp 👉</a>' : '' !!}
    </div>
</div>
@endsection