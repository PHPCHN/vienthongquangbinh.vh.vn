@extends('layout.user')
@section('title')
Tư vấn giải pháp - thiết bị
@endsection
@section('description')
Tư vấn giải pháp - thiết bị | Công ty phân phối lắp đặt Camera tại Đà Nẵng | Miền Trung
@endsection
@section('keywords')
Tư vấn giải pháp - thiết bị
@endsection
@section('og-image')
{{asset('asset/img/logo.png')}}
@endsection
@section('content')
<h1 class="hidden-all">Tư vấn giải pháp - thiết bị</h1>
<h2 class="hidden-all">Phân phối camera tại Đà Nẵng</h2>
<h3 class="hidden-all">Nhà thầu hệ thống an ninh hàng đầu</h3>
<div class="new row">
  <h6><a href="/">TRANG CHỦ</a>
    -> Tư vấn giải pháp - thiết bị - {{$news_all->getTotal()}} bài viết</h6>
  <div class="col-xs-12">
  {{$news_all->links()}}
  </div>
  @foreach ($news_all as $news)
  <div class="item col-sm-6">
    <div class="row">
      <div class="detail center">
        <a href="/tu-van-giai-phap-thiet-bi/{{$news->id}}"><p class="title">{{$news->title}}</p></a>
      </div>
      <div class="img">
        <a href="/tu-van-giai-phap-thiet-bi/{{$news->id}}">
          <img alt="{{$news->image}}" src="{{asset($news->image_link())}}" ></a>
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
