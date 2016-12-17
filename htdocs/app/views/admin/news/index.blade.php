@extends('layout.admin')
@section('css')
@endsection
@section('content')
<div class="product row">
  <h6>QUẢN LÝ TIN TỨC</h6>
  <form role="form" method="get" action="/admin/news/create">
    <button type="submit" class="btn btn-primary">Thêm Tin Tức</button>
  </form>
  @include('layout.partial.flash')
  {{$news_list->links()}}
  <table class="table table-hover">
    <thead>
      <th>STT</th>
      <th>Tiêu đề</th>
      <th>Sửa TT</th>
    </thead>
    @foreach($news_list as $index => $news)
      <tr>
        <td>{{ $index+1 }} </td>
        <td>{{$news->title}}</td>
        <td>
          <form role="form" method="get" action="/admin/news/{{$news->id}}/edit">
            <button type="submit" class="btn btn-warning">Sửa</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
  {{$news_list->links()}}
</div>
@endsection
