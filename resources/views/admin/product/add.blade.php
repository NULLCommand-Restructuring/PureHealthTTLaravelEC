@extends('admin.main')

@section('insertView')
<form action="/add-product" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên Sản Phẩm</label>
                    <input type="text" name="productname" value="{{ old('productname') }}" class="form-control"
                        placeholder="Nhập tên sản phẩm">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Phân loại</label>
                    <select name="typecode" class="form-control" name="typecode">
                        @foreach($types as $type)
                        <option value="{{ $type->typecode }}">{{ $type->typename }} ({{$type->description}})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Giá Gốc (VND)</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="form-control"
                        placeholder="Vui lòng nhập số nguyên, ví dụ: 100000">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Giảm giá (%)</label>
                    <input type="number" name="discount" value="{{ old('discount') }}" class="form-control"
                        placeholder="Vui lòng nhập giá trị từ 0 - 100">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mô Tả </label>
                    <input type="text" name="shortdescription" class="form-control"
                        placeholder="Nhập vào mô tả tổng quát về sản phẩm"
                        value="{{ old('shortdescription') }}"></input>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Đơn vị</label>
                    <select name="unitcode" class="form-control" name="typecode">
                        @foreach($units as $unit)
                        <option value="{{ $unit->unitcode }}">{{ $unit->unitname }} ({{$unit->description}})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Mô Tả Chi Tiết</label>
            <textarea name="description" id="description" class="form-control"
                placeholder="Nhập mô tả chi tiết về sản phẩm">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label>Ảnh Sản Phẩm</label>
            <input type="file" accept="image/jpeg, image/png" class="form-control" id="upload_img">
            <div class="mt-2" id="image_show">
            </div>
            <input type="hidden" name="picturelink" id="thumb">
        </div>

        <div class="form-group">
            <label>Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                <label for="no_active" class="custom-control-label">Không</label>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class=" col-md-12 btn btn-primary">Thêm sản phẩm</button>
    </div>
    @csrf
</form>
@endsection