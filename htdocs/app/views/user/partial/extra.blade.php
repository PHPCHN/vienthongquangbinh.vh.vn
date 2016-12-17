<div class="extra-title row">
  ĐỐI TÁC KHÁCH HÀNG THƯỜNG XUYÊN
</div>
<div class="extra row">
  <?php
  $ex_imgs = array(
    'dlink', 'mdli', 'vantech', 'mdla', 'avtech', 'mdlb',
    'vdtech', 'mdlj', 'hikvision', 'mdlc', 'questek', 'mdld',
    'nichietsu', 'mdlk', 'protek', 'mdle', 'icam', 'mdlf',
    'hisharp', 'mdll', 'samsung', 'mdlg', 'kocom', 'mdlh',
    'lilin', 'mdlm', 'tibet', 'mdli', 'panasonic', 'mdlj',
    'sony', 'mdlk', 'commax', 'mdll', 'dmax', 'mdlm',
  );
  ?>
  <div class="marquee">
    @foreach($ex_imgs as $ex_img)
      <img alt="{{$ex_img}}" src="{{asset('asset/img/'.$ex_img.'.png')}}">
    @endforeach
  </div>
  <style></style>
  <script>
    $('.marquee').marquee({
      //speed in milliseconds of the marquee
      duration: 15000,
      //gap in pixels between the tickers
      gap: 4,
      //time in milliseconds before the marquee will start animating
      delayBeforeStart: 0,
      //'left' or 'right'
      direction: 'left',
      //true or false - should the marquee be duplicated to show an effect of continues flow
      duplicated: true
    });
  </script>
</div>
