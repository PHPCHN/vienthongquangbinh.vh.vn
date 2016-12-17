@foreach($pdt_udt as $pdt)
  <p>
    insert into products(cate_id, name, code, image, price, description, content, new, created_at)
    values('{{$pdt[0]}}', 'Camera {{$pdt[1]}}', '{{$pdt[1]}}', '{{$pdt[1]}}.png', '{{$pdt[2]}}', '{{$pdt[3]}}', '{{$pdt[4]}}', 1, '{{date('Y-m-d H:i:s')}}');
  </p>
@endforeach
