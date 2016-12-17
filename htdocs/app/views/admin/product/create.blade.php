@extends('layout.admin')
@section('css')
@endsection
@section('content')
<div class="product row">
<h6>THÊM SẢN PHẨM</h6>
@include('layout.partial.flash')
<form class="form-horizontal" role="form" action="/admin/product"
  enctype="multipart/form-data" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <input type="hidden" name="cate_id" value="0" />
  <div class="form-group {{ProductCreateFilter::has_error('code')}}">
   <label class="control-label col-sm-2" for="code">Mã SP:</label>
   <div class="col-sm-8">
     <input type="text" name="code" class="form-control">
     <p>{{ProductCreateFilter::error('code')}}</p>
   </div>
  </div>
  <div class="form-group {{ProductCreateFilter::has_error('name')}}">
   <label class="control-label col-sm-2" for="name">Tên SP:</label>
   <div class="col-sm-8">
     <input type="text" name="name" class="form-control">
     <p>{{ProductCreateFilter::error('name')}}</p>
   </div>
  </div>
  <div class="form-group {{ProductCreateFilter::has_error('cate_id')}}">
   <label class="control-label col-sm-2" for="name">Danh mục:</label>
   <div class="col-sm-8">
     <select name="cate_id" class="form-control">
       @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
       @endforeach
     </select>
     <p>{{ProductCreateFilter::error('cate_id')}}</p>
   </div>
  </div>
  <div class="form-group {{ProductCreateFilter::has_error('description')}}">
   <label class="control-label col-sm-2" for="description">Mô tả:</label>
   <div class="col-sm-8">
     <textarea id="description" name="description" class="form-control" >
     </textarea>
     <p>{{ProductCreateFilter::error('description')}}</p>
   </div>
  </div>
  <div class="form-group {{ProductCreateFilter::has_error('price')}}">
   <label class="control-label col-sm-2" for="price">Đơn giá:</label>
   <div class="col-sm-8">
     <input type="text" name="price" class="form-control">
     <p>{{ProductCreateFilter::error('price')}}</p>
   </div>
  </div>
  <div class="form-group {{ProductCreateFilter::has_error('image')}}">
   <label class="control-label col-sm-2" for="image">Ảnh:</label>
   <div class="col-sm-8">
     <input type="file" name="image" class="form-control" accept="image/*">
     <p>{{ProductCreateFilter::error('image')}}</p>
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
@endsection
