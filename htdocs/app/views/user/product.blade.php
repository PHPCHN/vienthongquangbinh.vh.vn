@extends('layout.user')
<?php $sub_cate = Session::get('sub_cate');
      $category = Session::get('category');
      $product = Session::get('product'); ?>
@section('title')
{{$product->name}}
@endsection
@section('description')
{{$product->name}} | Công ty phân phối lắp đặt Camera tại Đà Nẵng | Miền Trung
@endsection
@section('keywords')
{{$product->name}}
@endsection
@section('og-image')
{{asset($product->image_link())}}
@endsection
@section('content')
<div class="product row">
  <h6><a href="/">TRANG CHỦ</a>
    -> <a href="/{{$category->keyword}}">{{$category->name}}</a>
    @if($sub_cate->id != $category->id)
    -> <a href="/{{$sub_cate->keyword}}">{{$sub_cate->name}}</a>
    @endif
    -> <a href="/{{$category->keyword}}/{{$product->code}}">{{$product->code}}</a>
  </h6>
  @include('layout.partial.flash')
  <div class="img-detail col-sm-6">
    <div class="new-pr">
      @if($product->new)
      <img alt="newpr" src="{{asset('asset/img/newpr.png')}}" >
      @endif
      @if($product->pro)
      <img alt="prpr" src="{{asset('asset/img/prpr.png')}}" >
      @endif
    </div>
    <img alt="{{$product->image}}" src="{{asset($product->image_link())}}">
    <div class="g-plus">
    <div class="g-plusone" data-size="medium"
    data-href="{{asset($category->keyword.'/'.$product->code)}}"></div></div>
    <div class="fb-like" data-href="{{asset($category->keyword.'/'.$product->code)}}"
    data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
  </div>
  <div class="detail col-sm-6">
    <h1 class="title">{{$product->name}}</h1>
    <p class="price">Giá: <span class="price-sp">{{$product->price_label()}}</span></p>
    <div class="description">
    <p>Thương hiệu: {{$product->get_opt_th()}}</p>
    <?=$product->description ?>
    </div>
    <p class="price contact">Liên hệ <span class="price-sp">0987 926 117 - 0942 926 117</span> để được tư vấn Miễn Phí - Hỗ trợ kỹ thuật và giao hàng trên toàn quốc</p>
  </div>
  <div class="detail-exp col-xs-12">
    <ul class="nav nav-tabs">
      <li class="{{OrderFilter::has_back()?'':'active'}}"><a data-toggle="tab" href="#detail">THÔNG TIN CHI TIẾT</a></li>
      <li><a data-toggle="tab" href="#comment">BÌNH LUẬN</a></li>
      <li class="{{OrderFilter::has_back()?'active':''}}"><a data-toggle="tab" href="#order">ĐẶT MUA</a></li>
    </ul>

    <div class="tab-content">
      <div id="detail" class="tab-pane fade {{OrderFilter::has_back()?'':'in active'}}">
        <a href="/{{$category->keyword}}/{{$product->code}}"><h3 class="title">{{$product->name}}</h3></a>
        <?=$product->content ?>
      </div>
      <div id="comment" class="tab-pane fade">
        <div class="fb-comments" data-href="{{asset($category->keyword.'/'.$product->code)}}" data-numposts="5" data-mobile="true"></div>
      </div>
      <div id="order" class="tab-pane fade {{OrderFilter::has_back()?'in active':''}}">
        @include('user.partial.order')
      </div>
    </div>
  </div>
</div>
<?php $product_involves = $product->list_involve(); ?>
<div class="product row">
  <h2>SẢN PHẨM LIÊN QUAN</h2>
  @foreach ($product_involves as $product)
  <div class="item col-xs-6 col-sm-3 col-md-2">
    <div class="p1 row">
      <div class="new-pr">
        @if($product->new)
        <img alt="newpr" src="{{asset('asset/img/newpr.png')}}" >
        @endif
        @if($product->pro)
        <img alt="prpr" src="{{asset('asset/img/prpr.png')}}" >
        @endif
      </div>
      <div class="img">
        <img alt="{{$product->image}}" src="{{asset($product->image_link())}}" >
      </div>
      <div class="cont">
        <div class="cont-abs">
          <p>{{$product->name}}<p>
          <p class="code">{{$product->code}}</p>
          <p class="price">{{$product->price_label()}}</p>
        </div>
      </div>
      <form method="get" class="exp"
      action="/{{$product->link}}">
      <button type="submit" class="btn btn-warning">Chi tiết</button>
      </form>
    </div>
    <div class="p2 row">
      <p class="code">{{$product->code}}</p>
      <p class="price">{{$product->price_label()}}</p>
      <div class="description"><?=$product->description ?></div>
      <form method="get" class="exp"
      action="/{{$product->link}}">
      <button type="submit" class="btn btn-warning">Chi tiết</button>
      </form>
    </div>
  </div>
  @endforeach
</div>
@endsection
@section('extra')
@include('user.partial.extra')
@endsection
@section('js')
  <script src="{{asset('asset/js/order.js')}}"></script>
@endsection
