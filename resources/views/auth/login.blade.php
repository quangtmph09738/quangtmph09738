@extends('welcome')
@section('content')
<div class="clearfix">
        <div class="page-index">
          
          <div class="container">
            <p>
              Home - Login
            </p>
          </div>
          
        </div>
      
      <div class="clearfix"></div>
      <div class="container_fullwidth">
        <div class="container shopping-cart">
        <div class="col-10 offset-1">
        @if( session()->has('error') === true )
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        @endif
        <form action="{{route('auth.login')}}" method="post">
            @csrf
            <div class="row mt-3">
                <label for="">email</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" width="300px">
            </div>
            <div class="row mt-3">
                <label for="">password</label>
                <input class="form-control" type="password" name="password">
            </div>
            <div class="mt-4 mb-5">
                <button type="submit" class="btn btn-primary">dang nhap</button>
            </div>
        </form>
    </div>
          
        </div>
      </div>
      <div class="clearfix"></div>

@endsection