<!-- @extends('layout')
@section('content')
@section('title','add category')
<form method="POST" action="{{ route('admin.category.store') }}">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Tên danh muc</label>
    <input type="text" class="form-control" name="name" id="" value=" {{ old('name') }}">
    @error('name')
        <div id="" class="form-text text-danger">{{$message}}</div>
    @enderror
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Them</button>
</form>
@endsection() -->
