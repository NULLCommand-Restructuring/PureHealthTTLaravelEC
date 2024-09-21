@extends('admin.main')
@section('insertView')
<table class="table">
    <thead>
        <tr>
            <th>Mã số</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Phân quyền</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td><a href="/user-details/{{$user->usercode}}">{{$user->usercode}}</a></td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            @if($user->role == 1)
            <td>Quản trị viên</td>
            @else
            <td>Khách hàng</td>
            @endif
            @if($user->active == 1)
            <td><span class=" btn btn-success btn-xs">ACTIVE</span></td>
            @else
            <td> <span class="btn btn-danger btn-xs">INACTIVE</span></td>
            @endif
            <td>
                <a class="btn btn-primary btn-sm" href="/change-user/{{$user->usercode}}">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow('{{$user->usercode}}', '/delete-user')">
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
        {!! $users->previousPageUrl() ? '<a href="'.$users->previousPageUrl().'">👈 Trang trước</a>' : '' !!}
    </div>
    <div>
        <ul class="pagination__numbers" style="display: flex; list-style: none;">
            @php
            $currentPage = $users->currentPage();
            $lastPage = $users->lastPage();
            $startPage = max($currentPage - 2, 1);
            $endPage = min($currentPage + 2, $lastPage);
            @endphp

            @for ($page = $startPage; $page <= $endPage; $page++) <li class="{{ $page == $currentPage ? 'active' : '' }}" style="margin-right: 10px;">
                @if ($page == $currentPage)
                <span>{{ $page }}</span>
                @else
                <a href="{{ $users->url($page) }}">{{ $page }}</a>
                @endif
                </li>
                @endfor
        </ul>
    </div>
    <div class="mr-2 pagination__next">
        {!! $users->nextPageUrl() ? '<a href="'.$users->nextPageUrl().'">Trang tiếp 👉</a>' : '' !!}
    </div>
</div>
@endsection