<table border="1">
  <thead>
    <th class="hidden-xs">STT</th>
    <th>Sản phẩm</th>
    <th>SL</th>
    <th>Thành tiền</th>
  </thead>
  <?php $total_price = 0; ?>
  @foreach($cart as $index => $cart_pdt)
    <?php
      $pdt_price = $cart_pdt->price*$cart_pdt->ql;
      $total_price += $pdt_price;
      ?>
    <tr>
      <td class="hidden-xs">{{$index+1}}</td>
      <td>
        <img width="100" alt="{{$cart_pdt->image}}" style="float:left"
          src="{{$message->embed(asset($cart_pdt->image_link()))}}">
        <p>{{$cart_pdt->name}}</p>
        <p>{{number_format($cart_pdt->price,0,',','.')}} VND</p>
      </td>
      <td>{{$cart_pdt->ql}}</td>
      <td class="ql-pr">{{number_format($pdt_price,0,',','.')}} VND</td>
    </tr>
  @endforeach
  <tr>
    <th class="hidden-xs">#</th>
    <th>Tổng cộng</th>
    <th colspan="2">{{number_format($total_price,0,',','.')}} VND</th>
  </tr>
  <tr>
    <th class="hidden-xs"></th>
    <th colspan="1">Họ Tên</th>
    <th colspan="2">{{$cart_info['name']}}</th>
  </tr>
  <tr>
    <th class="hidden-xs"></th>
    <th colspan="1">Điện thoại</th>
    <th colspan="2">{{$cart_info['phone']}}</th>
  </tr>
  <tr>
    <th class="hidden-xs"></th>
    <th colspan="1">Địa chỉ</th>
    <th colspan="2">{{$cart_info['address']}}</th>
  </tr>
  <tr>
    <th class="hidden-xs"></th>
    <th colspan="1">Ghi chú</th>
    <th colspan="2">{{$cart_info['comment']}}</th>
  </tr>
</table>
