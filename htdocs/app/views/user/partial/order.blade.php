<table class="cart table table-hover">
  <thead>
    <th class="hidden-xs">STT</th>
    <th>Sản phẩm</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    <th>Xoá</th>
  </thead>
  <?php $total_price = 0; ?>
@if(Session::has('cart'))
  @foreach(Session::get('cart') as $index => $cart_pdt)
    <?php
      $pdt_price = $cart_pdt->price*$cart_pdt->ql;
      $total_price += $pdt_price;
      ?>
    <tr>
      <td class="hidden-xs">{{$index+1}}</td>
      <td width="30%"><div class="img col-sm-2 hidden-xs">
        <img alt="{{$cart_pdt->image}}" src="{{asset($cart_pdt->image_link())}}">
        </div>
        <div class="col-sm-10">
          <p class="title">{{$cart_pdt->name}}</p>
          <p class="price">{{number_format($cart_pdt->price,0,',','.')}} VND</p>
        </div></td>
      <td class="{{OrderFilter::has_error('ql.'.$cart_pdt->id)}}">
        <input class="form-control ql" form="form-order" type="text"
        name="ql[{{$cart_pdt->id}}]" value="{{$cart_pdt->ql}}">
        <p>{{OrderFilter::error('ql.'.$cart_pdt->id)}}</p></td>
      <td class="ql-pr">{{number_format($pdt_price,0,',','.')}} VND</td>
      <td>
        <input type="submit" form="form-order"
          name="sm_rm_{{$cart_pdt->id}}" value="X" class="btn btn-danger">
      </td>
    </tr>
  @endforeach
@endif
  <tr>
    <th class="hidden-xs">#</th>
    <th colspan="2">Tổng cộng</th>
    <th colspan="2" id="total_price">{{number_format($total_price,0,',','.')}} VND</th>
  </tr>
</table>
<?php
  if(Session::has('cart_info')) {
    $cart_info = Session::get('cart_info');
  } else $cart_info = false;
?>
<form class="form-horizontal" role="form"
    method="post" action="/dat-hang" id="form-order">
  <div class="form-group {{OrderFilter::has_error('name')}}">
   <label class="control-label col-sm-2" for="name">Họ Tên:</label>
   <div class="col-sm-8">
     <input type="text" name="name" class="form-control"
      value="{{$cart_info?$cart_info['name']:''}}">
      <p>{{OrderFilter::error('name')}}</p>
   </div>
  </div>
  <div class="form-group {{OrderFilter::has_error('phone')}}">
   <label class="control-label col-sm-2" for="phone">Điện thoại:</label>
   <div class="col-sm-8">
     <input type="text" name="phone" class="form-control"
      value="{{$cart_info?$cart_info['phone']:''}}">
      <p>{{OrderFilter::error('phone')}}</p>
   </div>
  </div>
  <div class="form-group {{OrderFilter::has_error('address')}}">
   <label class="control-label col-sm-2" for="address">Địa chỉ:</label>
   <div class="col-sm-8">
     <input type="text" name="address" class="form-control"
      value="{{$cart_info?$cart_info['address']:''}}">
      <p>{{OrderFilter::error('address')}}</p>
   </div>
  </div>
  <div class="form-group {{OrderFilter::has_error('comment')}}">
   <label class="control-label col-sm-2" for="comment">Ghi chú:</label>
   <div class="col-sm-8">
     <textarea name="comment"
     class="form-control"><?=$cart_info?$cart_info['comment']:'' ?></textarea>
     <p>{{OrderFilter::error('comment')}}</p>
   </div>
  </div>
  <div class="submit">
    @if(isset($product))
    <input type="hidden" name="pdt" value="{{$product->id}}">
    <input type="submit" name="sm_add" value="Thêm {{$product->name}} vào giỏ" class="btn btn-primary">
    @endif
    <input type="submit" name="sm_order" value="Đặt mua" class="btn btn-warning">
  </div>
</form>
