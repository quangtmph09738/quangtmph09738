@extends('layout')
@section('title')
quan ly user
@endsection()


@section('content')

@if(!empty($users))
<table class="table">
  <div>
    <a href="{{route('admin.users.add')}}" class="btn btn-success">add</a>
  </div>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">numberphone</th>
      <th scope="col">gender</th>
      <th scope="col">role</th>
      <th colspan="2">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->address}}</td>
      <td>{{ $user->gender == config('common.user.gender.male') ? "nam" : "nữ" }}</td>
      <td>{{$user->role}}</td>
      <td>
        <a href="{{route('admin.users.edit', [ 'id' => $user->id ])}}" class="btn btn-warning">update</a>
        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete_user">delete</a>
      </td>
      <td>
      <div class="modal fade" id="delete_user" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Confirm delete</h4>
                  </div>
                  <div class="modal-body">
                    <p>Bạn có chắc muốn xoá bản ghi này</p>
                  </div>
                  <div class="modal-footer">
                    <form action="" method="post">
                      @csrf
                      <input type="submit" name="submit"  class="btn btn-danger" data-dismiss="modal">
                    </form>
                  </div>
                </div>
                
              </div>
            </div>
      </td>
    </tr>
    
    @endforeach
  </tbody>
</table>
@else
<h3>không có dữ liệu</h3>
@endif
<!-- Button trigger modal -->

@endsection()