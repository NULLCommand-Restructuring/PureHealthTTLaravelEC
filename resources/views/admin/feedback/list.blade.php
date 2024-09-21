@extends('admin.main')
@section('insertView')
<table class="table">
    <thead>
        <tr>
            <th>Mã phản hồi</th>
            <th>Mã khách hàng</th>
            <th>Mã đơn hàng</th>
            <th>Nội dung phản hồi</th>
            <th>SĐT</th>
            <th>Thời gian tạo phản hồi</th>
            <th>Hoàn tất</th>
        </tr>
    </thead>
    <tbody>
        @foreach($feedbacks as $feedback)
        <tr>
            <td>{{$feedback->feedbackcode}}</td>
            <td><a href="/user-details/{{$feedback->customercode}}">{{$feedback->customercode}}</a></td>
            <td><a href="/order-details/{{$feedback->ordercode}}">{{$feedback->ordercode}}</a></td>
            <td>{{$feedback->content}}</td>
            <td>{{$feedback->phone}}</td>
            <td>{{$feedback->created_at}}</td>
            <td><a style="background-color: lime;" class="btn btn-primary btn-sm" href="/check-feedback/{{$feedback->feedbackcode}}">
                    <i class="fas fa-spell-check"></i>
                </a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('paginate')
<div style="display: flex; justify-content: space-between; margin-top: -10px;" class="pagination">
    <div class="ml-2 pagination__previous">
        {!! $feedbacks->previousPageUrl() ? '<a href="'.$orders->previousPageUrl().'">👈 Trang trước</a>' : '' !!}
    </div>
    <div>
        <ul class="pagination__numbers" style="display: flex; list-style: none;">
            @php
            $currentPage = $feedbacks->currentPage();
            $lastPage = $feedbacks->lastPage();
            $startPage = max($currentPage - 2, 1);
            $endPage = min($currentPage + 2, $lastPage);
            @endphp

            @for ($page = $startPage; $page <= $endPage; $page++) <li class="{{ $page == $currentPage ? 'active' : '' }}" style="margin-right: 10px;">
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
        {!! $feedbacks->nextPageUrl() ? '<a href="'.$orders->nextPageUrl().'">Trang tiếp 👉</a>' : '' !!}
    </div>
</div>
@endsection