@extends('layout.user')
@section('title')
{{$project->name}}
@endsection
@section('description')
{{$project->name}}, Công ty phân phối lắp đặt Camera tại Đà Nẵng | Miền Trung
@endsection
@section('keywords')
{{$project->name}}
@endsection
@section('og-image')
{{asset($project->image_link())}}
@endsection
@section('content')
<h1 class="hidden-all">{{$project->name}}</h1>
<h2 class="hidden-all">Phân phối camera tại Đà Nẵng</h2>
<h3 class="hidden-all">Nhà thầu hệ thống an ninh hàng đầu</h3>
<div class="new row">
  <h6><a href="/">TRANG CHỦ</a>
    -> <a href="/cong-trinh">CÔNG TRÌNH</a>
    -> {{$project->name}}</h6>
  <div class="row">
    <div class="item-detail">
      <p class="title">{{$project->name}}</p>
      <p class="date">{{date_format($project->created_at, 'd/m/Y G:iA')}}</p>
      <div class="img-detail">
        <img alt="{{$project->image}}" src="{{asset($project->image_link())}}" >
      </div>
      <div class="description"><?=$project->description ?></div>
      <div class="content"><?=$project->content ?></div>
    </div>
  </div>
</div>
@endsection
@section('extra')
@include('user.partial.extra')
@endsection
