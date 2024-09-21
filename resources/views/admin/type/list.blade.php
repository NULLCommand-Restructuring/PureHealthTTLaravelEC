@extends('admin.main')

@section('insertView')
<table class="table">
    <thead>
        <tr>
            <th>Mã số</th>
            <th>Tên phân loại</th>
            <th>Mô tả phân loại</th>
            <th>Trạng thái</th>
            <th style="width: 100px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $type)
        <tr>
            <td>{{$type->typecode}}</td>
            <td>{{$type->typename}}</td>
            <td>{{$type->description}}</td>
            @if ($type->active == 1)
            <td><span style="margin-left: 0.4vw;" class=" btn btn-success btn-xs">ACTIVE</span></td>
            @else
            <td> <span style="margin-left: 0.4vw;" class=" btn btn-danger btn-xs">INACTIVE</span></td>
            @endif
            <td>
                <a class="btn btn-primary btn-sm" href="/edit-type/{{$type->typecode}}">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow('{{$type->typecode}}', 'delete-type')">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('paginate')
<div style="display: flex;
    justify-content: space-between; margin-top: -10px;" class="pagination">
    <div class="ml-2 pagination__previous">
        {!! $types->previousPageUrl() ? '<a href="'.$types->previousPageUrl().'">
            👈 Trang trước
        </a>' : '' !!}
    </div>
    <div class="mr-2 pagination__next">
        {!! $types->nextPageUrl() ? '<a href="'.$types->nextPageUrl().'">
            Trang tiếp 👉
        </a>' : ''
        !!}
    </div>
</div>
@endsection