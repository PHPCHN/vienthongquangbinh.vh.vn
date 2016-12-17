@extends('layout.user')
@section('title')
Camera Đà Nẵng | CÔNG TY PHÂN PHỐI LẮP ĐẶT CAMERA HÀNG ĐẦU ĐÀ NẴNG
@endsection
@section('description')
Camera Đà Nẵng | Công ty phân phối lắp đặt Camera tại Đà Nẵng | Miền Trung | Nhà thầu hệ thống an ninh hàng đầu | Với đội ngũ kỹ thuật tay nghề cao
@endsection
@section('keywords')
Camera Đà Nẵng, nhà thầu camera tại Đà Nẵng, phân phối camera miền trung, máy báo trộm, camera KBVISION
@endsection
@section('og-image')
{{asset('asset/img/logo.png')}}
@endsection
@section('headcontent')
@include('user.partial.headcontent')
@endsection
@section('content')
<h1 class="hidden-all">Camera Đà Nẵng</h1>
<h2 class="hidden-all">Phân phối camera tại Đà Nẵng</h2>
<h3 class="hidden-all">Nhà thầu hệ thống an ninh hàng đầu</h3>
<div class="product row">
  <h6><ul class="nav nav-tabs">
    <li class="main active"><a data-toggle="tab" href="#top_products">TOP BÁN CHẠY NHẤT</a></li>
    <li class=""><a data-toggle="tab" href="#projects">CÔNG TRÌNH</a></li>
    <li class=""><a data-toggle="tab" href="#during_projects">CÔNG TRÌNH ĐANG THI CÔNG</a></li>
    <li class=""><a data-toggle="tab" href="#top_projects">CÔNG TRÌNH TIÊU BIỂU</a></li>
  </ul></h6>
  <div class="tab-content">
    <div id="top_products" class="tab-pane fade in active">
    @foreach ($products['top'] as $product)
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
            <p>{{$product->name}}</p>
            <p class="code">{{$product->code}}</p>
            <p class="price">{{$product->price_label()}}</p>
          </div>
        </div>
        <form method="get" class="exp" action="/{{$product->link}}">
        <button type="submit" class="btn btn-warning">Chi tiết</button>
        </form>
      </div>
      <div class="p2 row">
        <p class="code">{{$product->code}}</p>
        <p class="price">{{$product->price_label()}}</p>
        <div class="description"><?=$product->description ?></div>
        <form method="get" class="exp" action="/{{$product->link}}">
        <button type="submit" class="btn btn-warning">Chi tiết</button>
        </form>
      </div>
    </div>
    @endforeach
    </div>
    <?php $home_projects = Session::get('home_projects'); ?>
    <div id="projects" class="tab-pane fade">
      @foreach($home_projects['top'] as $project)
      <div class="project item">
        <div class="row">
          <div class="detail">
            <a href="/cong-trinh/{{$project->id}}"><p class="name">{{$project->name}}</p></a>
          </div>
          <div class="img-pj col-xs-6 col-sm-4">
            <img alt="{{$project->image}}" src="{{asset($project->image_link())}}" >
          </div>
          <div class="detail">
            <p class="description"><?=strip_tags($project->description) ?></p>
            <p class="date">{{date_format($project->created_at, 'd/m/Y G:iA')}}</p>
          </div>
        </div>
      </div>
      @endforeach
      <div class="more-pj">
        <a href="/cong-trinh">Xem thêm</a>
      </div>
    </div>
    <div id="during_projects" class="tab-pane fade">
      @foreach($home_projects['dur'] as $project)
      <div class="project item">
        <div class="row">
          <div class="detail">
            <a href="/cong-trinh/{{$project->id}}"><p class="name">{{$project->name}}</p></a>
          </div>
          <div class="img-pj col-xs-6 col-sm-4">
            <img alt="{{$project->image}}" src="{{asset($project->image_link())}}" >
          </div>
          <div class="detail">
            <p class="description"><?=strip_tags($project->description) ?></p>
            <p class="date">{{date_format($project->created_at, 'd/m/Y G:iA')}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div id="top_projects" class="tab-pane fade">
      @foreach ($home_projects['pro'] as $project)
      <div class="project item col-sm-6">
        <div class="row">
          <div class="detail center">
            <a href="/cong-trinh/{{$project->id}}"><p class="name">{{$project->name}}</p></a>
          </div>
          <div class="img-pj">
            <a href="/cong-trinh/{{$project->id}}">
              <img alt="{{$project->image}}" src="{{asset($project->image_link())}}" ></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@foreach ($products['categories'] as $category)
@if($category->sup_id == 0)
<div class="product row">
  <h6><ul class="nav nav-tabs">
    <li class="main active"><a data-toggle="tab" href="#{{$category->keyword}}">{{$category->name}}</a></li>
    @foreach ($products['categories'] as $sub_cate)
    @if($sub_cate->sup_id == $category->id)
      <li class="hidden-xs"><a data-toggle="tab" href="#{{$sub_cate->keyword}}">{{$sub_cate->name}}</a></li>
    @endif
    @endforeach
  </ul></h6>
  <div class="tab-content">
    <div id="{{$category->keyword}}" class="tab-pane fade in active">
    @if(isset($products[$category->id]))
    @foreach ($products[$category->id] as $product)
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
            <p>{{$product->name}}</p>
            <p class="code">{{$product->code}}</p>
            <p class="price">{{$product->price_label()}}</p>
          </div>
        </div>
        <form method="get" class="exp" action="/{{$product->link}}">
        <button type="submit" class="btn btn-warning">Chi tiết</button>
        </form>
      </div>
      <div class="p2 row">
        <p class="code">{{$product->code}}</p>
        <p class="price">{{$product->price_label()}}</p>
        <div class="description"><?=$product->description ?></div>
        <form method="get" class="exp" action="/{{$product->link}}">
        <button type="submit" class="btn btn-warning">Chi tiết</button>
        </form>
      </div>
    </div>
    @endforeach
    @endif
    </div>
    @foreach ($products['categories'] as $sub_cate)
    @if($sub_cate->sup_id == $category->id)
      <div id="{{$sub_cate->keyword}}" class="tab-pane fade">
        @if(isset($products[$sub_cate->id]))
        @foreach ($products[$sub_cate->id] as $product)
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
                <p>{{$product->name}}</p>
                <p class="code">{{$product->code}}</p>
                <p class="price">{{$product->price_label()}}</p>
              </div>
            </div>
            <form method="get" class="exp" action="/{{$product->link}}">
            <button type="submit" class="btn btn-warning">Chi tiết</button>
            </form>
          </div>
          <div class="p2 row">
            <p class="code">{{$product->code}}</p>
            <p class="price">{{$product->price_label()}}</p>
            <div class="description"><?=$product->description ?></div>
            <form method="get" class="exp" action="/{{$product->link}}">
            <button type="submit" class="btn btn-warning">Chi tiết</button>
            </form>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    @endif
    @endforeach
  </div>
</div>
@endif
@endforeach
@endsection
@section('extra')
@include('user.partial.extra')
@endsection
@section('js')
<div class="events">
  <div class="back">
  </div>
  <a href="/camera" target="_blank">
    <img alt="events" src="{{asset('asset/img/image10120.jpg')}}">
  </a>
  <div class="close">
    <span class="glyphicon glyphicon-remove-circle"></span>
  </div>
</div>
<script>
  $('.events').on('click', function(){
    $(this).hide();
  });
</script>
@endsection
