<div class="new ads-news row">
  <a href="/qc"><h6>QUẢNG CÁO</h6></a>
  <div class="ads-mark">
    <img alt="ads-mark" src="{{asset('asset/img/ads-mark.png')}}">
  </div>
  <style id="vrc-style-vn2"></style>
  <div class="carousel  vn2 slide" data-class="vn2" data-ride="carousel" data-pause="hover"
  data-type="multi" data-limit="2" data-interval="2000" id="verCarousel-2">
     <ol class="carousel-indicators">
     </ol>
     <div class="carousel-inner" role="listbox">
  @foreach (Session::get('ads_list') as $index => $news)
  <div class="item {{$index==0?'active':''}}">
    <a href="/qc/{{$news->id}}">
    <div class="row">
      <div class="img col-xs-12">
        <img alt="{{$news->image}}" src="{{asset($news->image_link())}}" >
      </div>
    </div>
    </a>
  </div>
  @endforeach
  </div>
  <a class="right down carousel-control" href="#verCarousel-2" role="button" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
  </a>
  </div>
</div>
