@extends('layout.user')
@section('title')
Công Trình | Camera Đà Nẵng
@endsection
@section('description')
Công Trình | Công ty phân phối lắp đặt Camera tại Đà Nẵng | Miền Trung
@endsection
@section('keywords')
Công Trình
@endsection
@section('og-image')
{{asset('asset/img/logo.png')}}
@endsection
@section('headcontent')
@include('user.partial.headcontent')
@endsection
@section('content')
<h1 class="hidden-all">Công Trình, Camera Đà Nẵng</h1>
<h2 class="hidden-all">Phân phối camera tại Đà Nẵng</h2>
<h3 class="hidden-all">Nhà thầu hệ thống an ninh hàng đầu</h3>
<div class="new row">
  <h6><a href="/">TRANG CHỦ</a>
    -> CÔNG TRÌNH - {{$project_all->getTotal()}} BÀI VIẾT</h6>
  <div class="col-xs-12">
  {{$project_all->links()}}
  </div>
  @foreach ($project_all as $project)
  <div class="item">
    <div class="row">
      <div class="detail">
        <a href="/cong-trinh/{{$project->id}}"><p class="title">{{$project->name}}</p></a>
      </div>
      <div class="img col-xs-6 col-sm-4">
        <img alt="{{$project->image}}" src="{{asset($project->image_link())}}" >
      </div>
      <div class="detail">
        <p class="description"><?=strip_tags($project->description) ?></p>
        <p class="date">{{date_format($project->created_at, 'd/m/Y G:iA')}}</p>
      </div>
    </div>
  </div>
  @endforeach
  <div class="col-xs-12">
  {{$project_all->links()}}
  </div>
</div>
@endsection
@section('extra')
@include('user.partial.extra')
@endsection
