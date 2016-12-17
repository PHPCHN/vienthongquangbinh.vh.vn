@extends('layout.admin')
@section('content')
<div class="product row">
  <h6>ĐĂNG NHẬP</h6>
  @if (Session::has('message'))
    <div class="alert alert-danger">
        {{ Session::get('message') }}
    </div>
  @endif
  <form class="form-horizontal" role="form" method="post">
  <div class="form-group">
   <label class="control-label col-sm-2" for="email">Username:</label>
   <div class="col-sm-8">
     <input type="text" name="username" class="form-control" id="email" placeholder="">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="pwd">Password:</label>
   <div class="col-sm-8">
     <input type="password" name="password" class="form-control" id="pwd" placeholder="">
   </div>
  </div>
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-8">
     <button type="submit" class="btn btn-default">Đăng nhập</button>
   </div>
  </div>
  </form>
</div>
@endsection
