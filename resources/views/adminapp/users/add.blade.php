@extends('layout')
@section('content')
@section('title','add user')
<form method="POST" action="{{route('admin.users.store')}}">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Tên</label>
    <input type="text" class="form-control" name="name" id="" value="{{ old('name') }}">
    @error('name')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">email</label>
    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
    @error('email')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">password</label>
    <input type="password" class="form-control" name="password">
    @error('password')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">địa chỉ</label>
    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
    @error('address')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
        <select name="gender" class="form-select" aria-label="Default select example">
            <option 
            value="{{ config('common.user.gender.male') }}" 
            {{ old('gender' , config( 'common.user.gender.male' ) ) == config( 'common.user.gender.male' ) ? "selected" : "" }} 
            >nam</option>
            <option 
            value="{{ config('common.user.gender.female') }}"
            {{ old( 'gender' , config( 'common.user.gender.male' ) ) == config( 'common.user.gender.female' ) ? "selected" : "" }}
            >nữ</option>
        </select>
        @error('gender')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
        @enderror
  </div>
  <div class="mb-3">
        <select name="role" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option value="{{ config('common.user.role.user') }} " {{ old('role') == config('common.user.role.user') ? 'selected' : '' }}>user</option>
            <option value="{{ config('common.user.role.admin') }}" {{ old('role') == config('common.user.role.admin') ? 'selected' : '' }}>admin</option>
        </select>
        @error('role')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
        @enderror
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection()
