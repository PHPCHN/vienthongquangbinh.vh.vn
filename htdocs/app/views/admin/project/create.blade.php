@extends('layout.admin')
@section('css')
@endsection
@section('content')
<div class="product row">
<h6>THÊM CÔNG TRÌNH</h6>
@include('layout.partial.flash')
<form class="form-horizontal" role="form" action="/admin/project"
  enctype="multipart/form-data" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <div class="form-group {{ProjectCreateFilter::has_error('name')}}">
   <label class="control-label col-sm-2" for="name">Tên CT:</label>
   <div class="col-sm-8">
     <input type="text" name="name" class="form-control">
     <p>{{ProjectCreateFilter::error('name')}}</p>
   </div>
  </div>
  <div class="form-group {{ProjectCreateFilter::has_error('description')}}">
   <label class="control-label col-sm-2" for="description">Mô tả:</label>
   <div class="col-sm-8">
     <textarea id="description" name="description" class="form-control" >
     </textarea>
     <p>{{ProjectCreateFilter::error('description')}}</p>
   </div>
  </div>
  <div class="form-group {{ProjectCreateFilter::has_error('content')}}">
   <label class="control-label col-sm-2" for="description">Chi tiết:</label>
   <div class="col-sm-8">
     <textarea id="content" name="content" class="form-control" >
     </textarea>
     <p>{{ProjectCreateFilter::error('content')}}</p>
   </div>
  </div>
  <div class="form-group {{ProjectCreateFilter::has_error('image')}}">
   <label class="control-label col-sm-2" for="image">Ảnh:</label>
   <div class="col-sm-8">
     <input type="file" name="image" class="form-control" accept="image/*">
     <p>{{ProjectCreateFilter::error('image')}}</p>
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
