@extends('layout.admin')
@section('css')
@endsection
@section('content')
<div class="product row">
  <h6>QUẢN LÝ THÔNG TIN CÔNG TRÌNH</h6>
  <form role="form" method="get" action="/admin/project/create">
    <button type="submit" class="btn btn-primary">Thêm Công Trình</button>
  </form>
  @include('layout.partial.flash')
  {{$projects->links()}}
  <table class="table table-hover">
    <thead>
      <th>STT</th>
      <th>Tên</th>
      <th>Home</th>
      <th>Đang TC</th>
      <th>Tiêu biểu</th>
      <th>Sửa TT</th>
    </thead>
    @foreach($projects as $index => $project)
      <tr>
        <td>{{ $index+1 }} </td>
        <td>{{$project->name}}</td>
        <td>
          <form role="form" method="post" action="/admin/project/{{$project->id}}/top">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <button type="submit" class="btn btn-{{$project->top==1?'danger':'info'}}">
              {{$project->top==1?'Down':'Up'}}</button>
          </form>
        </td>
        <td>
          <form role="form" method="post" action="/admin/project/{{$project->id}}/dur">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <button type="submit" class="btn btn-{{$project->dur==1?'danger':'info'}}">
              {{$project->dur==1?'Down':'Up'}}</button>
          </form>
        </td>
        <td>
          <form role="form" method="post" action="/admin/project/{{$project->id}}/pro">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <button type="submit" class="btn btn-{{$project->pro==1?'danger':'info'}}">
              {{$project->pro==1?'Down':'Up'}}</button>
          </form>
        </td>
        <td>
          <form role="form" method="get" action="/admin/project/{{$project->id}}/edit">
            <button type="submit" class="btn btn-warning">Sửa</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
  {{$projects->links()}}
</div>
@endsection
