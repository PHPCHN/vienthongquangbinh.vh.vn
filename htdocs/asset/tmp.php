{"error":{"number":1,"message":"The PHP installation does not meet the minimum system requirements for CKFinder. Missing PHP extensions: GD. Please refer to CKFinder documentation for more details."}}

<!--iframe width="140" height="140" frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyB1ZQbRSqjnQlYYaUYOtcs0erl0WB4TUtg
    &q=Camera+Đại+Hữu+Nghị">
</iframe-->

#g-map {
  position: relative;
  width: 100%;
  height: 0;
  padding-bottom: 80%;
  margin-top: 15px;
}

#g-map .map {
  position: absolute;
  width: 100%;
  height: 100%;
}

2.0Mp, zoom quang 30x, zoom số 16x

25/30fps@(1920x1080), 25/30/50/60fps@ 1.0Mp, 3DNR

Hỗ trợ chức năng tuần tra thông minh autotracking

Hỗ trợ thẻ nhớ tối đa 128gb

Hỗ trợ âm thanh 2 chiều.

Tầm xa hồng ngoại: 500m

Chuẩn chống nước và bụi IP67

Nhiệt độ hoạt động -40~+70°C

Cảm biến 1.0 Megapixel Omni Vision

1.0Mp 25/30fps@(1280x720), 2D-DNR

Tầm xa hồng ngoại: 30m

Ống kính: 3.6mm (góc nhìn 72°)

H.264 và MJPEG

DC12V, POE, IP67

Nhiệt độ hoạt động -30~+60°C


Cảm biến 1/3" 1.3 Megapixel Aptina

1.3Mp 25/30fps@ (1280x960), 3D-DNR

Tầm xa hồng ngoại: 30m

Ống kính: 3.6mm (góc nhìn 75°)

Wifi chuẩn (IEEE802.11b/g/n) 50m

Hỗ trợ thẻ nhớ tối đa 128GB

DC12V, IP67

Nhiệt độ hoạt động -30~+60°C

---------------------------------------

Đầu ghi hình HDCVI 4 kênh +1 kênh IP

Kết nối Camera CVI/Analog/IP (5Mp)

Chuẩn nén hình ảnh: H264, H264+

Ghi hình ở độ phân giải 1080N/720P

Cổng ra: VGA/HDMI

Audio: 1 cổng vào 1 cổng ra, hỗ trợ âm thanh 2 chiều

Hỗ trợ chuẩn Onvif 2.4

Hỗ trợ 1 SATA x6TB, 2 USB 2.0

$query->whereIn('id', function($query) use ($keys){
  $query->from('product_seos')
      ->whereIn('seo_id', function($query) use ($keys){
        $query->from('seos')->where(function($query) use ($keys){
          foreach($keys as $key) {
            $query->orWhere('keyword', 'like', '%'.$key.'%')
              ->orWhereRaw("'$key' like concat('%',keyword,'%')");
            }
        })->lists('id');
      })->groupBy('product_id')
      ->havingRaw('count(product_id)>1')
      ->lists('product_id');
});

->orWhere(function($query) use ($keys){
  foreach($keys as $key) {
    $query->whereIn('id', function($query) use ($key){
      $query->from('products')
        ->join('categories', 'categories.id', '=', 'products.cate_id')
        ->where('keyword', 'like', '%'.$key.'%')
        ->orWhereRaw("'$key' like concat('%',keyword,'%')")
        ->select(['products.id'])->lists('id');
    });
}
});

->where(function($query) use ($keys){
  foreach($keys as $key) {
    $query->orWhere('code', 'like', '%'.$key.'%')
      ->orWhereRaw("'$key' like concat('%',code,'%')");
    }
  })->where(function($query) use ($keys){
    foreach($keys as $key) {
      $query->orWhereIn('id', function($query) use ($key){
        $query->from('products')
          ->join('categories', 'categories.id', '=', 'products.cate_id')
          ->where('keyword', 'like', '%'.$key.'%')
          ->orWhereRaw("'$key' like concat('%',keyword,'%')")
          ->select(['products.id'])->lists('id');
      });
  }
  });

Độ phân giải 2.0 Megapixel

Ống kính cố định 3,6mm cho góc nhìn lên đến 83°

Tầm xa hồng ngoại 30m

DC12V, IP67

Môi trường làm việc từ -30°C~+60°C

https://www.google.com/url?sa=t&rct=j&url=http%3A%2F%2Fdaihuunghi.vn%2F&source=maps&cd=1&usg=AFQjCNGRKCYLAAn9962N1vV2lRw2WFFHGw&sig2=3PpeettX4T5ykgZ3_RMRkw&ved=1t%3A3443%2Cp%3AiPg7WMDHMoTI0gTRhZq4Ag

https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=5&cad=rja&uact=8&ved=0ahUKEwivp7PYi8vQAhXCjJQKHd1gAJsQFghMMAQ&url=http%3A%2F%2Fcamera.0511.vn%2Ftin-tuc%2Fcon-mat-an-ninh-cua-thanh-pho%2Fcamera-toan-dan-giam-sat-an-ninh-thanh-pho-da-nang-25.html&usg=AFQjCNEiwcDjDcBnOSMuld41z_pkL03xRQ&sig2=lXSUP4yTg5XILwgH9lDfPw

https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=3&cad=rja&uact=8&ved=0ahUKEwivp7PYi8vQAhXCjJQKHd1gAJsQgU8IPjAC&url=http%3A%2F%2Fdaihuunghi.vn%2F&usg=AFQjCNGRKCYLAAn9962N1vV2lRw2WFFHGw&sig2=491xD3Gxf2cnEVkgu6WwFA

https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=14&cad=rja&uact=8&ved=0ahUKEwjFytatg8vQAhXEUZQKHRtrAxs4ChAWCCswAw&url=http%3A%2F%2Fdaihuunghi.vn%2F&usg=AFQjCNGRKCYLAAn9962N1vV2lRw2WFFHGw&sig2=sdKR40LwXciujzDzCZKifQ

https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=20&cad=rja&uact=8&ved=0ahUKEwiigJXB_MrQAhUHI5QKHeuoAUM4ChAWCE4wCQ&url=http%3A%2F%2Fdaihuunghi.vn%2Fdau-ghi%2FKX-7108TD4&usg=AFQjCNE6eZCGnzX8jRsahmTXmP54CiwD9A&sig2=hh5K8Yx4u6_tqynPrBSOqw

https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=3&cad=rja&uact=8&ved=0ahUKEwjs7pu69MrQAhXKqo8KHe-DDmwQgU8ISTAC&url=http%3A%2F%2Fhighmarksecurity.com%2F&usg=AFQjCNFQU0BvPvo2lZidTqlHZglNIRvQ6g&sig2=zKDZEcK8MP6rZWgccm8T3g

https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=8&cad=rja&uact=8&ved=0ahUKEwjs7pu69MrQAhXKqo8KHe-DDmwQFghoMAc&url=http%3A%2F%2Fhighmarksecurity.com%2F&usg=AFQjCNFQU0BvPvo2lZidTqlHZglNIRvQ6g&sig2=zKDZEcK8MP6rZWgccm8T3g

https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=4&cad=rja&uact=8&ved=0ahUKEwjs7pu69MrQAhXKqo8KHe-DDmwQgU8IUjAD&url=http%3A%2F%2Fdaihuunghi.vn%2F&usg=AFQjCNGRKCYLAAn9962N1vV2lRw2WFFHGw&sig2=1khCuXu8eoRmFm1MI9LxXg

https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=3&cad=rja&uact=8&ved=0ahUKEwiD_6L88srQAhUBso8KHd2dARUQFggpMAI&url=http%3A%2F%2Fdaihuunghi.vn%2F&usg=AFQjCNGRKCYLAAn9962N1vV2lRw2WFFHGw&sig2=3N3cwkRsdXwnWY8E-6UzVQ

https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=3&cad=rja&uact=8&ved=0ahUKEwirvozi7MrQAhUfTY8KHfkMD4AQFgg8MAI&url=http%3A%2F%2Fcameradanang.com%2F&usg=AFQjCNGqHeDGGEb5JvdWe-GLoeFJLLt7Ig&sig2=Idy6opmh02K0hC3H_DMuZA

https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=2&cad=rja&uact=8&ved=0ahUKEwirvozi7MrQAhUfTY8KHfkMD4AQFgg0MAE&url=http%3A%2F%2Fcamera.0511.vn%2Ftin-tuc%2Fcon-mat-an-ninh-cua-thanh-pho%2Fcamera-toan-dan-giam-sat-an-ninh-thanh-pho-da-nang-25.html&usg=AFQjCNEiwcDjDcBnOSMuld41z_pkL03xRQ&sig2=kKBsTASDkoCdVo5AAXEthw
