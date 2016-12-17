@extends('layout.user')
@section('title')
Tin tức | Camera Đà Nẵng
@endsection
@section('description')
Tin tức | Camera Đà Nẵng | Công ty phân phối lắp đặt Camera tại Đà Nẵng | Miền Trung
@endsection
@section('keywords')
Tin tức
@endsection
@section('og-image')
{{asset('asset/img/logo.png')}}
@endsection
@section('headcontent')
@include('user.partial.headcontent')
@endsection
@section('content')
<h1 class="hidden-all">Tin tức, Camera Đà Nẵng</h1>
<h2 class="hidden-all">Phân phối camera tại Đà Nẵng</h2>
<h3 class="hidden-all">Nhà thầu hệ thống an ninh hàng đầu</h3>
<div class="new row">
  <h6> <a href="/">TRANG CHỦ</a>
    -> TIN TỨC - {{$news_all->getTotal()}} BÀI VIẾT</h6>
  <div class="col-xs-12">
  {{$news_all->links()}}
  </div>
  @foreach ($news_all as $news)
  <div class="item">
    <div class="row">
      <div class="detail">
        <a href="/tin-tuc/{{$news->id}}"><p class="title">{{$news->title}}</p></a>
      </div>
      <div class="img col-xs-6 col-sm-4">
        <img alt="{{$news->image}}" src="{{asset($news->image_link())}}" >
      </div>
      <div class="detail">
        <p class="description"><?=strip_tags($news->description) ?></p>
        <p class="date">{{date_format($news->created_at, 'd/m/Y G:iA')}}</p>
      </div>
    </div>
  </div>
  @endforeach
  <div class="col-xs-12">
  {{$news_all->links()}}
  </div>
</div>
@endsection
@section('extra')
@include('user.partial.extra')
@endsection
