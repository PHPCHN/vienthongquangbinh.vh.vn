@extends('layout.admin')
@section('css')
@endsection
@section('content')
<div class="product row">
<h6>SỬA THÔNG TIN CÔNG TRÌNH</h6>
@include('layout.partial.flash')
<form class="form-horizontal" role="form" action="/admin/project/{{$project->id}}"
  enctype="multipart/form-data" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <input type="hidden" name="_method" value="put" />
  <div class="form-group {{ProjectUpdateFilter::has_error('name')}}">
   <label class="control-label col-sm-2" for="name">Tên CT:</label>
   <div class="col-sm-8">
     <input type="text" name="name" class="form-control" value="{{$project->name}}">
     <p>{{ProjectUpdateFilter::error('name')}}</p>
   </div>
  </div>
  <div class="form-group {{ProjectUpdateFilter::has_error('description')}}">
   <label class="control-label col-sm-2" for="description">Mô tả:</label>
   <div class="col-sm-8">
     <textarea id="description" name="description" class="form-control" >
       <?=$project->description ?>
     </textarea>
     <p>{{ProjectUpdateFilter::error('description')}}</p>
   </div>
  </div>
  <div class="form-group {{ProjectUpdateFilter::has_error('content')}}">
   <label class="control-label col-sm-2" for="content">Chi tiết:</label>
   <div class="col-sm-8">
     <textarea id="content" name="content" class="form-control" >
       <?=$project->content ?>
     </textarea>
     <p>{{ProjectUpdateFilter::error('content')}}</p>
   </div>
  </div>
  <div class="form-group {{ProjectUpdateFilter::has_error('image')}}">
   <label class="control-label col-sm-2" for="image">Ảnh:</label>
   <div class="col-sm-8">
     <input type="file" name="image" class="form-control" accept="image/*">
     <p>{{ProjectUpdateFilter::error('image')}}</p>
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
