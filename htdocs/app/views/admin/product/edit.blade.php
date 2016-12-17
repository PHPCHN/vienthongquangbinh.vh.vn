@extends('layout.admin')
@section('css')
@endsection
@section('content')
<?php $categories = Session::get('categories');
  $product_opts = Session::get('product_opts'); ?>
<div class="product row">
<h6>SỬA THÔNG TIN SẢN PHẨM</h6>
@include('layout.partial.flash')
<form class="form-horizontal" role="form" action="/admin/product/{{$product->code}}"
  enctype="multipart/form-data" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <input type="hidden" name="_method" value="put" />
  <div class="form-group {{ProductUpdateFilter::has_error('code')}}">
   <label class="control-label col-sm-2" for="code">Mã SP:</label>
   <div class="col-sm-8">
     <input type="text" name="code" class="form-control" value="{{$product->code}}">
     <p>{{ProductUpdateFilter::error('code')}}</p>
   </div>
  </div>
  <div class="form-group {{ProductUpdateFilter::has_error('name')}}">
   <label class="control-label col-sm-2" for="name">Tên SP:</label>
   <div class="col-sm-8">
     <input type="text" name="name" class="form-control" value="{{$product->name}}">
     <p>{{ProductUpdateFilter::error('name')}}</p>
   </div>
  </div>
  <div class="form-group {{ProductUpdateFilter::has_error('cate_id')}}">
   <label class="control-label col-sm-2" for="cate_id">Danh mục:</label>
   <div class="col-sm-8">
     <select name="cate_id" class="form-control">
       @foreach($categories as $category)
        <option value="{{$category->id}}"
          {{$category->id == $product->cate_id?'selected':''}}>
          {{$category->name}}</option>
       @endforeach
     </select>
     <p>{{ProductUpdateFilter::error('cate_id')}}</p>
   </div>
  </div>
  @foreach (Session::get('options') as $option)
  <div class="form-group">
   <label class="control-label col-sm-2" for="options">{{$option['opt']->name}}:</label>
   <div class="col-sm-8">
    <select class="form-control" name="options[]">
      <option disabled selected value>{{$option['opt']->name}}</option>
      @foreach ($option['val'] as $vals)
      @if(in_array($vals->id, $product_opts))
        <option value="{{$vals->id}}" selected>{{$vals->label}}</option>
      @else
        <option value="{{$vals->id}}">{{$vals->label}}</option>
      @endif
      @endforeach
    </select>
   </div>
  </div>
  @endforeach
  <div class="form-group {{ProductUpdateFilter::has_error('description')}}">
   <label class="control-label col-sm-2" for="description">Mô tả:</label>
   <div class="col-sm-8">
     <textarea id="description" name="description" class="form-control" >
       <?=$product->description ?>
     </textarea>
     <p>{{ProductUpdateFilter::error('description')}}</p>
   </div>
  </div>
  <div class="form-group {{ProductUpdateFilter::has_error('content')}}">
   <label class="control-label col-sm-2" for="content">Chi tiết:</label>
   <div class="col-sm-8">
     <textarea id="content" name="content" class="form-control" >
       <?=$product->content ?>
     </textarea>
     <p>{{ProductUpdateFilter::error('content')}}</p>
   </div>
  </div>
  <div class="form-group {{ProductUpdateFilter::has_error('price')}}">
   <label class="control-label col-sm-2" for="price">Đơn giá:</label>
   <div class="col-sm-8">
     <input type="text" name="price" class="form-control" value="{{$product->price}}">
     <p>{{ProductUpdateFilter::error('price')}}</p>
   </div>
  </div>
  <div class="form-group {{ProductUpdateFilter::has_error('image')}}">
   <label class="control-label col-sm-2" for="image">Ảnh:</label>
   <div class="col-sm-8">
     <input type="file" name="image" class="form-control" accept="image/*">
     <p>{{ProductUpdateFilter::error('image')}}</p>
   </div>
  </div>
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-8">
     <button type="submit" class="btn btn-default">Lưu lại</button>
   </div>
  </div>
</form>
</div>
@endsection
@section('js')
<script src="http://cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
<script>CKEDITOR.replace('description'); </script>
<script>CKEDITOR.replace('content', {
  filebrowserImageBrowseUrl: "{{asset('/images')}}",
  filebrowserImageUploadUrl: "{{asset('/uploadImage?_token='.csrf_token())}}",
}); </script>
@endsection
