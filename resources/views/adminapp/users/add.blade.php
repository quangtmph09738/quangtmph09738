@extends('layout')
@section('content')
@section('title','add user')
<form method="POST" action="/admin/users/add">
  <div class="mb-3">
    <label for="" class="form-label">Tên</label>
    <input type="text" class="form-control" name="name" id="">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="" class="form-label">email</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">địa chỉ</label>
    <input type="text" class="form-control" name="address">
  </div>
  <div class="mb-3">
        <select name="gender" class="form-select" aria-label="Default select example">
            <option value="0">nam</option>
            <option value="1">nữ</option>
        </select>
  </div>
  <div class="mb-3">
        <select name="role" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option value="0">user</option>
            <option value="1">admin</option>
        </select>
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection()
