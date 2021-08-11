@extends('layout')
@section('content')
@section('title','update product')
<form method="POST" action="{{ route('admin.product.update' , [ 'id' => $product->id]) }}" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Tên sản phẩm</label>
    <input type="text" class="form-control" name="name" id="" value="{{ $product->name }}">
    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Price</label>
    <input type="text" class="form-control" name="price" value="{{ $product->price }}">
    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Số lượng</label>
    <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}">
    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Mô tả sản phẩm</label>
    <input type="text" class="form-control" name="description" value="{{ $product->description }}">
    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Ảnh sản phẩm</label></br>
    <img src="{{ asset('images') }}/{{ $product->img }}" alt="" width="100px">
    <input type="file" class="form-control" name="img" value="{{ $product->img }}">
    @error('img')
        <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="mb-3">
        <select class="form-select" name="category_id" >
        <option selected>Danh mục sản phẩm</option>
            @foreach($cates as $cate)
            <option value="{{$cate->id}}" {{ $product->category_id == $cate->id ? "selected" : " " }} >{{$cate->name}}</option>
            @endforeach
        </select>
        
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection()
