@extends('admin.main')

@section('insertView')
<table class="table">
    <thead>
        <tr>
            <th>Mã số</th>
            <th style="min-width: 100px;">Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Phân loại</th>
            <th>Mô tả ngắn</th>
            <th style="min-width: 200px;">Mô tả đầy đủ</th>
            <th>Giá gốc (VND)</th>
            <th style="min-width: 100px;">Giảm giá (%)</th>
            <th>Đơn vị</th>
            <th>Trạng thái</th>
            <th style="width: 100px">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td><a href="/customer/product-details/{{$product->productcode}}">{{$product->productcode}}</a></td>
            <td style="min-width: 100px;">{{$product->productname}}</td>
            <td>
                <a href="{{$product->picturelink}}">
                    <img src="{{$product->picturelink}}" width="100px">
                </a>
            </td>
            <td>{{$product->type->typename}}</td>
            <td>{{$product->shortdescription}}</td>
            <td style="min-width: 200px;">{{$product->description}}</td>
            <td>{{number_format($product->price)}}</td>
            <td style="min-width: 100px;">{{$product->discount}}</td>
            <td>{{$product->unit->unitname}}</td>
            @if ($product->active == 1)
            <td><span class=" btn btn-success btn-xs">ACTIVE</span></td>
            @else
            <td> <span class="btn btn-danger btn-xs">INACTIVE</span></td>
            @endif
            <td>
                <a class="btn btn-primary btn-sm" href="/edit-product/{{$product->productcode}}">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow('{{$product->productcode}}', '/delete-product')">
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
        {!! $products->previousPageUrl() ? '<a href="'.$products->previousPageUrl().'">👈 Trang trước</a>' : '' !!}
    </div>
    <div>
        <ul class="pagination__numbers" style="display: flex; list-style: none;">
            @php
            $currentPage = $products->currentPage();
            $lastPage = $products->lastPage();
            $startPage = max($currentPage - 2, 1);
            $endPage = min($currentPage + 2, $lastPage);
            @endphp

            @for ($page = $startPage; $page <= $endPage; $page++) <li class="{{ $page == $currentPage ? 'active' : '' }}" style="margin-right: 10px;">
                @if ($page == $currentPage)
                <span>{{ $page }}</span>
                @else
                <a href="{{ $products->url($page) }}">{{ $page }}</a>
                @endif
                </li>
                @endfor
        </ul>
    </div>
    <div class="mr-2 pagination__next">
        {!! $products->nextPageUrl() ? '<a href="'.$products->nextPageUrl().'">Trang tiếp 👉</a>' : '' !!}
    </div>
</div>
@endsection