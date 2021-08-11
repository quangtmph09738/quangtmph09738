@extends('layout')
@section('title')
quản lý danh mục
@endsection()


@section('content')

@if(!empty($category))
<table class="table">
  <div>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-cate">Thêm danh mục</button>
  </div>
  @if(!empty($mess))
    <p>{{ $mess }}</p>
  @endif
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">slsp</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($category as $item)
    <tr id="row_{{$item->id}}">
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->products->count()}}</td>
      <td>
        <a href="" data-id="{{$item->id}}" onclick="show_edit(event.target)" class="btn btn-warning" data-target="#edit-cate" data-toggle="modal">update</a>
        <a href="javascript:void(0)" data-id="{{$item->id}}" onclick="deleteCate(event.target)" class="btn btn-danger" >delete</a>
      </td>
    </tr>
    
    @endforeach
  </tbody>
</table>
@else
<h3>không có dữ liệu</h3>
@endif
<!-- Modal add-cate-->
<div class="modal fade" id="add-cate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form-add">
          @csrf
          <div class="mb-3">
            <label for="" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" name="name" id="name_category">
            <span id="nameError" class="alert-message" style="color:red"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Modal edit-cate -->
<div class="modal fade" id="edit-cate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form-edit">
          @csrf
          <div class="mb-3">
            <label for="" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" name="name" id="name-cate-show-edit" value="">
            <input type="hidden" id="id_edit" value="">
            <span id="nameEditError" class="alert-message" style="color:red"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection()
@push('script')
  <script>
    $('#form-add').on('submit', function(event){
    event.preventDefault();
    let name = $('#name_category').val();
    var _token = $("input[name='_token']").val();
    $.ajax({
      url : "{{ route('admin.category.store') }}",
      type: 'POST',
      data : { _token:_token, name:name },
      success: function(response){
        toastr.success(response.success)
        $('#add-cate').modal('hide');
        
        $('tbody').prepend('<tr id="row_'+response.result.id+'"><th scope="row">'+response.result.id+'</th><td>'+response.result.name+'</td><td></td><td><a href="" data-id="'+response.result.id+'" onclick="show_edit(event.target)" class="btn btn-warning" data-target="#edit-cate" data-toggle="modal">update</a><a href="javascript:void(0)" data-id="'+response.result.id+'" onclick="deleteCate(event.target)" class="btn btn-danger" >delete</a></tr>');
        $('#form-add')[0].reset();
      },
      error : function(response){
        $('#nameError').text(response.responseJSON.errors.name);
      }
    });
  });
  </script>
  <script>
    function show_edit(event){
      var id = $(event).data('id');
      var url = `category/edit/${id}`;
      $.ajax({
        url: url,
        type: "GET",
        success: function(response){
          $('#name-cate-show-edit').val(response.data.name),
          $('#id_edit').val(response.data.id)
        }
      });
      
    }
  </script>
  <script>
    $('#form-edit').on('submit', function(e){
      e.preventDefault();
      let id = $('#id_edit').val();
      let url = `category/edit/${id}`;
      var _token = $("input[name='_token']").val();
      let name = $('#name-cate-show-edit').val();
      $.ajax({
        url: url,
        type: "POST",
        data : {
          id: id,
          name: name,
          _token: _token
        },
        success: function(response){
          toastr.success(response.message);
          $("#row_"+response.data.id+" td:nth-child(2)").html(response.data.name);
          $('#edit-cate').modal('hide');
          $('#form-edit')[0].reset();
        },
        error: function(response){
          $('#nameEditError').text(response.responseJSON.errors.name);
        }
      })
    });
  </script>
  <script>
    function deleteCate(event){
      if(confirm('may muon xoa chu?')){
        let id = $(event).data('id');
        var _token = $("input[name='_token']").val();
        let url = `category/delete/${id}`;
        $.ajax({
          url: url,
          type: "POST",
          data: {
            _token: _token,
          },
          success: function(response){
            if(response.success){
              toastr.success(response.success);
              $('#row_'+id+'').remove();
              console.log(response.success);
            }else{
              toastr.warning(response.error);
              console.log(response.error);
            }
          },
          error: function(response){
            // console.log(response.error);
          }
        });
      }
    }
  </script>
@endpush
