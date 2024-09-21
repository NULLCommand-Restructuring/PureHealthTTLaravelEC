@extends('admin.main')

@section('insertView')
<form action="/add-unit" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Tên đơn vị</label>
                    <input type="text" name="unitname" value="{{ old('unitname') }}" class="form-control" placeholder="Nhập tên đơn vị hàng">
                </div>
            </div>

        </div>

        <div class="form-group">
            <label>Mô tả đơn vị hàng</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary col-md-12">Thêm đơn vị hàng</button>
    </div>
    @csrf
</form>
@endsection