<div class="new prov row">
  <h6>LẮP CAMERA CÁC TỈNH</h6>
    @foreach(News::const_about('cac-tinh') as $prov)
    <div class="item">
    <a href="/lap-dat-camera-tai-{{$prov}}">
      <p class="h6"><span class="glyphicon glyphicon-check">
      </span> Lắp đặt <span class="h7"> Camera tại {{News::const_about('prov-title')[$prov]}}</span></p></a>
      <div class="prov-cities">
      @foreach(News::const_about($prov) as $dst)
      <a href="/lap-dat-camera-tai-{{$prov}}/{{$dst}}">
        <p class="h6"><span class="glyphicon glyphicon-check">
        </span> Lắp đặt <span class="h7"> Camera tại {{News::const_about('prov-title')[$dst]}}</span></p></a>
      @endforeach
      </div>
    </div>
    @endforeach
</div>
