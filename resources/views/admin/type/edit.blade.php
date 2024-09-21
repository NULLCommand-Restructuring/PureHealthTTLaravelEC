@extends('admin.main')
@section('insertView')
<form action="/edit-type" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Tên phân loại</label>
                    <input type="text" name="typename" value="{{$typeElement->typename}}" class="form-control" placeholder="Nhập tên phân loại">
                </div>
            </div>

        </div>

        <div class="form-group">
            <label>Mô tả phân loại</label>
            <textarea name="description" class="form-control">{{$typeElement->description}}</textarea>
        </div>

        <div class="form-group">
            <label>Kích hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{ $typeElement->active == 1 ? 'checked' : '' }}>
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" {{ $typeElement->active == 0 ? 'checked' : '' }}>
                <label for="no_active" class="custom-control-label">Không</label>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary col-md-12">Cập nhật thông tin</button>
    </div>
    <input type="hidden" value="{{$typeElement->typecode}}" name="typecode">
    @csrf
</form>
@endsection