@extends('layout.user')
@section('title')
Giỏ hàng | Camera Đà Nẵng
@endsection
@section('description')
Giỏ hàng | Camera Đà Nẵng | Công ty phân phối lắp đặt Camera tại Đà Nẵng | Miền Trung
@endsection
@section('keywords')
Giỏ hàng,
@endsection
@section('og-image')
{{asset('asset/img/logo.png')}}
@endsection
@section('content')
<h1 class="hidden-all">Giỏ hàng, Camera Đà Nẵng</h1>
<h2 class="hidden-all">Phân phối camera tại Đà Nẵng</h2>
<h3 class="hidden-all">Nhà thầu hệ thống an ninh hàng đầu</h3>
<div class="product row">
  <h6><a href="/">TRANG CHỦ</a>
    -> GIỎ HÀNG</h6>
  @include('layout.partial.flash')
  <div class="col-xs-12">
    @include('user.partial.order')
  </div>
</div>
@endsection
@section('extra')
@include('user.partial.extra')
@endsection
