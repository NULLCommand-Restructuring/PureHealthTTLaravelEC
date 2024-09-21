@extends('admin.main')

@section('insertView')
<table class="table">
    <thead>
        <tr>
            <th>Mã số</th>
            <th>Tên đơn vị hàng</th>
            <th>Mô tả</th>
            <th style="width: 100px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($units as $unit)
        <tr>
            <td>{{$unit->unitcode}}</td>
            <td style="padding-left: 2vw;">{{$unit->unitname}}</td>
            <td>{{$unit->description}}</td>
            <td>
                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow('{{$unit->unitcode}}', '/delete-unit')">
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
        {!! $units->previousPageUrl() ? '<a href="'.$types->previousPageUrl().'">
            👈 Trang trước
        </a>' : '' !!}
    </div>
    <div class="mr-2 pagination__next">
        {!! $units->nextPageUrl() ? '<a href="'.$types->nextPageUrl().'">
            Trang tiếp 👉
        </a>' : ''
        !!}
    </div>
</div>
@endsection