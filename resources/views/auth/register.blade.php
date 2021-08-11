@extends('welcome')
@section('content')
<div class="clearfix">
        <div class="page-index">
          <div class="container">
            <p>
              Home - Register
            </p>
          </div>
        </div>
      <div class="clearfix"></div>
      <div class="container_fullwidth">
        <div class="container shopping-cart">
        <div class="col-10 offset-1">
        <form action="{{ route('auth.adduser') }}" method="post" style="width: 300px; margin:auto">
            @csrf
            <div class="row mt-3">
                <label for="">Họ và Tên</label>
                <input class="form-control" type="text" name="name" value="" width="300px" value="{{old('name')}}">
            </div>
            @error('name')
                <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
            <div class="row mt-3">
                <label for="">email</label>
                <input class="form-control" type="email" name="email" value="" width="300px" value="{{old('email')}}">
            </div>
            @error('email')
                <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
            <div class="row mt-3">
                <label for="">password</label>
                <input class="form-control" type="password" name="password">
            </div>
            @error('password')
                <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
            <div class="row mt-3">
                <label for="">Địa chỉ</label>
                <input class="form-control" type="text" name="address" value="" width="300px" value="{{old('address')}}">
            </div>
            @error('address')
                <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
            <input type="hidden" value="1" name="role">
            <div class="row mt-3" style="width: 100px">
                <label for="">Giới tính</label>
                <select class="form-control" id="exampleFormControlSelect1" name="gender">
                    <option value="1">nam</option>
                    <option value="0">nữ</option>
                </select>
            </div>
            <div class="mt-4 mb-5">
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </div>
        </form>
    </div>
          
        </div>
      </div>
      <div class="clearfix"></div>
@endsection