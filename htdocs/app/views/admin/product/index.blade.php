@extends('layout.admin')
@section('css')
@endsection
@section('content')
<?php $categories = Session::get('categories'); ?>
<div class="product row">
  <h6>QUẢN LÝ SẢN PHẨM</h6>
  <form role="form" method="get" action="/admin/product/create">
    <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
  </form>
  @include('layout.partial.flash')
  {{$products->links()}}
  <table class="table table-hover">
    <thead>
      <th>STT</th>
      <th>Mã SP</th>
      <th>Danh mục</th>
      <th>Top</th>
      <th>Home</th>
      <th>Tab</th>
      <th>New</th>
      <th>KM</th>
      <th>Sửa TT</th>
    </thead>
    @foreach($products as $index => $product)
      <tr>
        <td>{{ $index+1 }} </td>
        <td>{{$product->code}}</td>
        <td>{{$categories[$product->cate_id]}}</td>
        <td>
          <form role="form" method="post" action="/admin/product/{{$product->code}}/top">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <button type="submit" class="btn btn-{{$product->top==1?'danger':'info'}}">
              {{$product->top==1?'Down':'Up'}}</button>
          </form>
        </td>
        <td>
          <form role="form" method="post" action="/admin/product/{{$product->code}}/home">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <button type="submit" class="btn btn-{{$product->home==1?'danger':'info'}}">
              {{$product->home==1?'Down':'Up'}}</button>
          </form>
        </td>
        <td>
          <form role="form" method="post" action="/admin/product/{{$product->code}}/tab">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <button type="submit" class="btn btn-{{$product->tab==1?'danger':'info'}}">
              {{$product->tab==1?'Down':'Up'}}</button>
          </form>
        </td>
        <td>
          <form role="form" method="post" action="/admin/product/{{$product->code}}/new">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <button type="submit" class="btn btn-{{$product->new==1?'danger':'info'}}">
              {{$product->new==1?'Off':'On'}}</button>
          </form>
        </td>
        <td>
          <form role="form" method="post" action="/admin/product/{{$product->code}}/pro">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <button type="submit" class="btn btn-{{$product->pro==1?'danger':'info'}}">
              {{$product->pro==1?'Off':'On'}}</button>
          </form>
        </td>
        <td>
          <form role="form" method="get" action="/admin/product/{{$product->code}}/edit">
            <button type="submit" class="btn btn-warning">Sửa</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
  {{$products->links()}}
</div>
@endsection
