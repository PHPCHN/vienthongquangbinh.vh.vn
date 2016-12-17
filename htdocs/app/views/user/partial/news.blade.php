@if(Session::has('product_seens'))
<div class="product-seen row">
  <h6>SẢN PHẨM VỪA XEM</h6>
  @foreach (array_reverse(Session::get('product_seens')) as $product)
  <div class="item col-xs-12">
    <a href="/{{$product->link}}/{{$product->code}}">
    <div class="row">
      <div class="img col-xs-6 col-sm-4">
        <img alt="{{$product->image}}" src="{{asset($product->image_link())}}" >
        <div class="new-pr">
          @if($product->new)
          <img alt="newpr" src="{{asset('asset/img/newpr.png')}}" >
          @endif
          @if($product->pro)
          <img alt="prpr" src="{{asset('asset/img/prpr.png')}}" >
          @endif
        </div>
      </div>
      <div class="detail col-xs-6 col-sm-8">
        <p class="name">{{$product->name}}</p>
        <p class="code">{{$product->code}}</p>
        <p class="price">{{$product->price_label()}}</p>
      </div>
    </div>
    </a>
  </div>
  @endforeach
</div>
@endif
<div class="new row">
  <h6>TIN TỨC</h6>
  <div class="more">
    <a href="/tin-tuc">Xem tất cả</a>
  </div>
  <style id="vrc-style-vn1"></style>
  <div class="carousel vertical vn1 slide" data-class="vn1" data-ride="carousel" data-pause="hover"
  data-type="multi" data-limit="3" data-interval="2000" id="verCarousel-1">
     <ol class="carousel-indicators">
     </ol>
     <div class="carousel-inner" role="listbox">
  @foreach (Session::get('news_list') as $index => $news)
  <div class="item {{$index==0?'active':''}}">
    <a href="/tin-tuc/{{$news->id}}">
    <div class="row">
      <div class="img col-xs-6 col-sm-4">
        <img alt="{{$news->image}}" src="{{asset($news->image_link())}}" >
      </div>
      <div class="detail">
        <p class="title">{{$news->title}}<p>
        <p class="description"><?=strip_tags($news->description) ?></p>
        <p class="date">{{date_format($news->created_at, 'd/m/Y G:iA')}}</p>
      </div>
    </div>
    </a>
  </div>
  @endforeach
</div>
<a class="right down carousel-control" href="#verCarousel-1" role="button" data-slide="next">
   <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
   <span class="sr-only">Next</span>
</a>
</div>
</div>
@include('user.partial.ads-news')
@include('user.partial.prov-news')
