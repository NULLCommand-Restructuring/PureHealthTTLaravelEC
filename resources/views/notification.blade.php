@if ($errors->any())
<div id="error-alert" class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session()->has('error'))
<div id="error-alert" class="alert alert-danger">
    {{Session::get('error')}}
</div>
@endif

@if(session()->has('success'))
<div id="success-alert" class="alert alert-primary">
    <ul>
        <li>{{session()->get('success')}}</li>
    </ul>
</div>
@endif