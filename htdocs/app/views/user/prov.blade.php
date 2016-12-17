@extends('layout.user')
@section('title')
{{$news->title}}
@endsection
@section('description')
{{$news->title}} | Công ty phân phối lắp đặt Camera tại Đà Nẵng | Miền Trung
@endsection
@section('keywords')
{{$news->title}}
@endsection
@section('og-image')
{{asset('asset/img/logo.png')}}
@endsection
@section('content')
<h1 class="hidden-all">{{$news->title}}</h1>
<h2 class="hidden-all">Phân phối camera tại Đà Nẵng</h2>
<h3 class="hidden-all">Nhà thầu hệ thống an ninh hàng đầu</h3>
<div class="new row">
  <h6><a href="/">TRANG CHỦ</a>
    -> {{$news->title}}</h6>
  <div class="row">
    <div class="item-detail">
      <p class="title">{{$news->title}}</p>
      <p class="date">{{date_format($news->created_at, 'd/m/Y G:iA')}}</p>
      <div class="img-detail">
        <img alt="{{$news->image}}" src="{{asset($news->image_link())}}" >
      </div>
      <div class="description"><?=$news->description ?></div>
      <div class="content"><?=$news->content ?></div>
    </div>
  </div>
</div>
@endsection
@section('extra')
@include('user.partial.extra')
@endsection
