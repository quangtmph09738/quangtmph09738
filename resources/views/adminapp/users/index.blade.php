@extends('layout')
@section('title')
quan ly user
@endsection()


@section('content')

@if(!empty($users))
<table class="table">
  <div>
    <form action="" method="">
      <div class="form-group">
        <input type="text" name="key" class="form-control"  aria-describedby="emailHelp" placeholder="Enter keyword">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <div>
    <a href="{{route('admin.users.add')}}" class="btn btn-success">add</a>
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> -->
  <!-- thêm mới
</button> -->
  </div>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">address</th>
      <th scope="col">don hang</th>
      <th scope="col">gender</th>
      <th scope="col">role</th>
      <th colspan="2">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td><a href="{{ route('admin.users.show', ['id' => $user->id])}}">{{ $user->name }}</a></td>
      <td>{{$user->email}}</td>
      <td>{{$user->address}}</td>
      <td>{{$user->invoices->count()}}</td>
      <!-- https://laravel.com/docs/8.x/eloquent-relationships#eager-loading -->
      <td>{{ $user->gender == config('common.user.gender.male') ? "nam" : "nữ" }}</td>
      <td>{{$user->role == config('common.user.role.user') ? "user" : "admin"}}</td>
      <td>
        <a href="{{route('admin.users.edit', [ 'id' => $user->id ])}}" class="btn btn-warning">update</a>
        <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $user->id }}">Delete</button>
      </td>
      <td>
                            <div class="modal fade" id="confirm_delete_{{ $user->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Xác nhận xóa bản ghi này?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                        <form method="POST" action="{{ route('admin.users.delete', [ 'id' => $user->id ]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Xóa</button>
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
{{ $users->links() }}
@else
<h3>không có dữ liệu</h3>
@endif
@endsection()
