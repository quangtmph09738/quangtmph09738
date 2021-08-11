@extends('layout')
@section('content')
@section('title','add product')
<form method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Tên sản phẩm</label>
    <input type="text" class="form-control" name="name" id="" value="{{old('name')}}">
    @error('name')
        <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Price</label>
    <input type="text" class="form-control" name="price" value="{{old('price')}}" >
    @error('price')
        <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Số lượng</label>
    <input type="text" class="form-control" name="quantity" value="{{old('quantity')}}">
    @error('quantity')
        <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Mô tả sản phẩm</label>
    <input type="text" class="form-control" name="description" value="{{old('description')}}">
    @error('description')
        <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Ảnh sản phẩm</label>
    <input type="file" class="form-control" name="img">
    @error('img')
        <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="mb-3">
        <select class="form-select" name="category_id" >
            @foreach($cates as $cate)
            <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection()
