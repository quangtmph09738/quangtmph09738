@extends('layout')
@section('content')
@section('title','add user')
<form method="POST" action="{{route('admin.users.update', [ 'id' => $data->id ])}}">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Tên</label>
    <input type="text" class="form-control" value="{{ $data->name }}" name="name" id="">
    @error('name')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">email</label>
    <input type="email" class="form-control" value="{{ $data->email }}" name="email">
    @error('email')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
    @enderror
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">địa chỉ</label>
    <input type="text" class="form-control" value="{{ $data->address }}" name="address">
    @error('address')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
        <select name="gender" class="form-select" aria-label="Default select example">
            <option value="0" {{ $data->gender == 0 ? "selected" :  ""}}>nữ</option>
            <option value="1" {{ $data->gender == 1 ? "selected" :  ""}}>nam</option>
        </select>
        @error('gender')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
        @enderror
  </div>
  <div class="mb-3">
        <select name="role" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option value="0" {{ $data->role == 0 ? "selected" :  ""}}>admin</option>
            <option value="1" {{ $data->role == 1 ? "selected" :  ""}}>user</option>
        </select>
        @error('role')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
        @enderror
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection()
