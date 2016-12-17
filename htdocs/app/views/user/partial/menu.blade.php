<div class="menu row">
  <div class="nav-menu navbar-default col-xs-12">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
        </button>
        <div class="search-box">
          <form class="col-xs-12" method="get" action="/search">
            <input class="form-control col-xs-12" type="text" name="search">
            <button type="submit" class="btn-default form-control">
              <span class="glyphicon glyphicon-search"></span></button>
          </form>
        </div>
    </div>
    <div class="navbar-collapse collapse" id="menu">
      <ul class="nav">
        <li class="search-box hidden-xs">
          <form class="col-xs-12" method="get" action="/search">
            <input class="form-control col-xs-12" type="text" name="search">
            <button type="submit" class="btn-default form-control">
              <span class="glyphicon glyphicon-search"></span></button>
          </form>
        </li>
        <li class="item"><a href="/camera" >
          <img alt="cam-icon" src="{{asset('asset/img/cam-icon.png')}}">
          CAMERA</a></li>
        <li class="item"><a href="/dau-ghi" >
          <img alt="nvr-icon" src="{{asset('asset/img/nvr-icon.png')}}">
          ĐẦU GHI</a></li>
        <li class="item"><a href="/bao-trom" >
          <img alt="icon-alm" src="{{asset('asset/img/icon-alm.png')}}">
          BÁO TRỘM</a></li>
        <li class="item"><a href="/bo-dam" >
          <img alt="icon-rad" src="{{asset('asset/img/icon-rad.png')}}">
          BỘ ĐÀM</a></li>
        <li class="item"><a href="/chuong-cua" >
          <img alt="icon-dbll" src="{{asset('asset/img/icon-dbll.png')}}">
          CHUÔNG CỬA</a></li>
        <li class="item"><a href="/cua-tu-dong" >
          <img alt="icon-otodr" src="{{asset('asset/img/icon-otodr.png')}}">
          CỬA TỰ ĐỘNG</a></li>
        <li class="item"><a href="/ups" >
          <img alt="icon-ups" src="{{asset('asset/img/icon-ups.png')}}">
          UPS</a></li>
        <li class="item"><a href="/phu-kien" >
          <img alt="icon-acx" src="{{asset('asset/img/icon-acx.png')}}">
          PHỤ KIỆN</a></li>
      </ul>
    </div>
  </div>
</div>
