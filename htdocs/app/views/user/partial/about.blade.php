<div class="about row">
  <div class="item col-xs-12 col-sm-3">
    <p class="h6">GIỚI THIỆU VỀ CÔNG TY</p>
    <ul>
    <li><a href="/gioi-thieu">Giới thiệu</a></li>
    <li><a href="/chinh-sach-uu-dai">Chính sách ưu đãi</a></li>
    <li><a href="/chinh-sach-bao-hanh">Chính sách bảo hành</a></li>
    <li><a href="/chinh-sach-van-chuyen">Chính sách vận chuyển</a></li>
    <li><a href="/chinh-sach-doi-tra-hang">Chính sách đổi trả hàng</a></li>
    <li><a href="/chinh-sach-bao-mat-thong-tin">Chính sách bảo mật thông tin</a></li>
    </ul>
  </div>
  <div class="item col-xs-6 col-sm-3">
    <p class="h6">THÔNG TIN TUYỂN DỤNG</p>
    <ul>
    <li><a href="/tuyen-nhan-vien-marketing-online">Tuyển nhân viên Marketing Online tại Đà Nẵng</a></li>
    <li><a href="/tuyen-nhan-vien-ky-thuat">Tuyển nhân viên Kỹ thuật tại Đà Nẵng</a></li>
    </ul>
  </div>
  <div class="item col-xs-6 col-sm-3">
    <p class="h6">HỖ TRỢ KHÁCH HÀNG</p>
    <ul>
    <li><a href="/ho-tro-ky-thuat">Hỗ trợ kỹ thuật</a></li>
    <li><a href="/kien-thuc-san-pham">Kiến thức sản phẩm</a></li>
    <li><a href="/tu-van-giai-phap-thiet-bi">Tư vấn giải pháp - thiết bị</a></li>
    <li><a href="/download">Download tài liệu - phần mềm</a></li>
    </ul>
  </div>
  <div class="item col-xs-12 col-sm-3">
    <p class="h6">THỐNG KÊ TRUY CẬP</p>
    <ul>
    <li>{{trans('messages.online')}}: {{Session::get('mechs')['online']}}</li>
    <li>{{trans('messages.visit-today')}}: {{Session::get('mechs')['visit-today']}}</li>
    <li>{{trans('messages.visit-yesterday')}}: {{Session::get('mechs')['visit-yesterday']}}</li>
    <li>{{trans('messages.this-month')}}: {{Session::get('mechs')['this-month']}}</li>
    <li>{{trans('messages.this-year')}}: {{Session::get('mechs')['this-year']}}</li>
    <li>{{trans('messages.total-visit')}}: {{Session::get('mechs')['total-visit']}}</li>
    </ul>
  </div>
</div>
<div class="about-b row">
  <?php
    $banks = array(
      'acb', 'anz', 'bidv', 'hsbc', 'mart', 'masu',
      'mb', 'scd', 'tech', 'vcom', 'vtin',
    );
  ?>
  <img class="bkard" alt="bkard" src="{{asset('asset/img/bkard.png')}}">
  @foreach($banks as $bank)
    <img alt="{{$bank}}" src="{{asset('asset/img/'.$bank.'.png')}}">
  @endforeach
</div>
