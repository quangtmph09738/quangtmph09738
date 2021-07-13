@extends('layout')
@section('title')
quan ly user
@endsection()


@section('content')

@if(!empty($users))
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">numberphone</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<h3>không có dữ liệu</h3>
@endif

@endsection()