@extends('layout')
@section('content')
@section('title' ,'quan ly product')
@if(!empty($products))
<table class="table">
<div class="form-group">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-product">Them san pham</button></br>
  <label for="exampleFormControlSelect1">Tìm kiếm sản phẩm</label>
  @csrf
  <input class="form-control" type="text" placeholder="enter key for search here…" id="name" name="name">
</div>
  <div>
    <!-- <a href="{{ route('admin.product.add') }}" class="btn btn-success">add</a> -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-product">Them san pham</button> -->
  </div>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">image</th>
      <th scope="col">price</th>
      <th scope="col">desc</th>
      <th scope="col">danh muc</th>
      <th colspan="2">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr id="row_{{ $product->id }}">
      <th scope="row">{{ $product->id }}</th>
      <td>{{ $product->name }}</a></td>
      <td><img src="{{ asset('images') }}/{{$product->img}}" alt="" width="70px"></td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->description }}</td>
      <!-- https://laravel.com/docs/8.x/eloquent-relationships#eager-loading -->
      <td>{{ $product->category->name }}</td>
      <td>
        <a href="" class="btn btn-warning" data-id="{{ $product->id }}" data-toggle="modal" data-target="#edit-product"  onclick="editProduct(event.target)">update</a>
        <a href="javascript:void(0)" data-id="{{ $product->id }}"  onclick="deleteProduct(event.target)" class="btn btn-danger">delete</a>
      </td>
    </tr>
    
    @endforeach
  </tbody>
  
</table>
<div class="d-flex justify-content-center">
    {!! $products->links() !!}
</div>
@else
<h3>không có dữ liệu</h3>
@endif
<!-- modal add product -->
<div class="modal fade" id="add-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Them san pham</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form-add" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="mb-3">
              <label for="" class="form-label">Tên sản phẩm</label>
              <input type="text" class="form-control" name="name">
              <span id="nameError" class="alert-message" style="color:red"></span>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Price</label>
              <input type="text" class="form-control" name="price" >
              <span id="priceError" class="alert-message" style="color:red"></span>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Số lượng</label>
              <input type="text" class="form-control" name="quantity" >
              <span id="qtyError" class="alert-message" style="color:red"></span>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Mô tả sản phẩm</label>
              <input type="text" class="form-control" name="description" >
              <span id="descError" class="alert-message" style="color:red"></span>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Ảnh sản phẩm</label>
              <input type="file" class="form-control" name="img" >
              <span id="imgError" class="alert-message" style="color:red"></span>
            </div>
            <div class="mb-3">
                  <select class="form-select" name="category_id" >
                      @foreach($cates as $cate)
                      <option value="{{$cate->id}}">{{$cate->name}}</option>
                      @endforeach
                  </select>
                  <span id="cateError" class="alert-message" style="color:red"></span>
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- modal edit product -->
<div class="modal fade" id="edit-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-edit" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id-pro-edit">
            <div class="mb-3">
              <label for="" class="form-label">Tên sản phẩm</label>
              <input type="text" class="form-control" name="name" id="name-edit">
              <span id="nameEditError" class="alert-message" style="color:red"></span>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Price</label>
              <input type="text" class="form-control" name="price" id="price-edit">
              <span id="priceEditError" class="alert-message" style="color:red"></span>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Số lượng</label>
              <input type="text" class="form-control" name="quantity" id="quantity-edit">
              <span id="qtyEditError" class="alert-message" style="color:red"></span>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Mô tả sản phẩm</label>
              <input type="text" class="form-control" name="description" id="description-edit">
              <span id="descEditError" class="alert-message" style="color:red"></span>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Ảnh sản phẩm</label></br>
              <img src="" alt="" width="100px">
              <input type="file" class="form-control" name="img" id="img-edit">
              <span id="imgEditError" class="alert-message" style="color:red"></span>
            </div>
            <div class="mb-3">
                  <select class="form-select" name="category_id" id="category-edit">
                  <option selected>Danh mục sản phẩm</option>
                      @foreach($cates as $cate)
                      <option value="{{$cate->id}}">{{$cate->name}}</option>
                      @endforeach
                  </select>
                  <span id="cateEditError" class="alert-message" style="color:red"></span>
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>

@endsection
@push('script')
<script>
  $(document).ready(function(){
 $('#form-add').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"{{ route('admin.product.store') }}",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(response)
   {
     console.log(response);
     $('#add-product').modal('hide');
     $('tbody').prepend('<tr id="row_'+response.data.id+'"><th scope="row">'+response.data.id+'</th><td>'+response.data.name+'</td><td><img src="{{ asset('images') }}/'+response.data.img+'" alt="" width="70px"></td><td>'+response.data.price+'</td><td>'+response.data.description+'</td><td>'+response.data.category_id+'</td><td><a href="" class="btn btn-warning" data-id="'+response.data.id+'" data-toggle="modal" data-target="#edit-product"  onclick="editProduct(event.target)">update</a><a href="javascript:void(0)" data-id="'+response.data.id+'"  onclick="deleteProduct(event.target)" class="btn btn-danger">delete</a></td></tr>');
     $('#form-add')[0].reset();
    toastr.success(response.success);
   },
   error: function(response){
    //  console.log(response);
    $('#nameError').text(response.responseJSON.errors.name);
    $('#priceError').text(response.responseJSON.errors.price);
    $('#qtyError').text(response.responseJSON.errors.quantity);
    $('#descError').text(response.responseJSON.errors.description);
    $('#imgError').text(response.responseJSON.errors.img);
    $('#cateError').text(response.responseJSON.errors.category_id);
   }
  });
 });
});
</script>
<script>
  function deleteProduct(event){
    if(confirm('mày muốn xoá chứ ? ')){
      let id = $(event).data('id');
      let _token = $("input[name='_token']").val();
      $.ajax({
        url: `product/delete/${id}`,
        type: "POST",
        data: {_token:_token},
        success: function(response){
          toastr.success(response.message);
          $('#row_'+id+'').remove();
        }
      });
    }
  }
</script>
<script>
  function editProduct(event){
    let id = $(event).data('id');
    $.ajax({
      url : `product/edit/${id}`,
      type: "GET",
      success: function(response){
        // console.log(response);
        $('#name-edit').val(response.data.name);
        $('#price-edit').val(response.data.price);
        $('#quantity-edit').val(response.data.quantity);
        $('#description-edit').val(response.data.description);
        $('#category-edit').val(response.data.category_id);
        $('#id-pro-edit').val(response.data.id);
        
      }
    });
  }
</script>
<script>
  $('#form-edit').on('submit', function(event){
    event.preventDefault();
    let id = $('#id-pro-edit').val();
    $.ajax({
      url: `product/edit/${id}`,
      type: "POST",
      data: new FormData(this),
      dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function(response){
          toastr.success(response.message);
          // let product = response.data.category.name;
          // console.log(response);
          $("#row_"+response.data.id+" td:nth-child(2)").html(response.data.name);
          $("#row_"+response.data.id+" td:nth-child(3) img").attr('src', '{{ asset('images') }}/'+response.data.img+'');
          $("#row_"+response.data.id+" td:nth-child(4)").html(response.data.price);
          $("#row_"+response.data.id+" td:nth-child(5)").html(response.data.description);
          $("#row_"+response.data.id+" td:nth-child(6)").html(response.category);
          $('#edit-product').modal('hide');
          $('#form-edit')[0].reset();
      },
      error: function(response){
        // console.log(response);
        $('#nameEditError').text(response.responseJSON.errors.name);
        $('#priceEditError').text(response.responseJSON.errors.price);
        $('#qtyEditError').text(response.responseJSON.errors.quantity);
        $('#descEditError').text(response.responseJSON.errors.description);
        $('#imgEditError').text(response.responseJSON.errors.img);
        $('#cateEditError').text(response.responseJSON.errors.category_id);
      }
    });
  });
</script>
<script>
  //search product
  $('#name').on('keyup',function(){
    let value = $(this).val();
    let _token = $("input[name='_token']").val();
    $.ajax({
      url: "{{ route('admin.product.search') }}",
      type: "GET",
      data: { name: value ,_token: _token},
      success: function(response){
        $('tbody').prepend(''+response+'');
        console.log(response);
      },
      error: function(response){
        console.log(response);
      }
    });
  }); 
  
</script>
@endpush
