@extends('customer.main')
@section('insertView')
<div style="position: relative; top: -1vw;" class="li-section-title">
    <h2>
        <span
            style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight: 600 !important;">{{$title}}</span>
    </h2>
</div>
<div style="display: flex; justify-content: center;" style="margin: -40px;">
    <iframe src="/Policy.pdf" style="height: 600px;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
@endsection