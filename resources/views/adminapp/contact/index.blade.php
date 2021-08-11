@extends('layout')
@section('title')
quan ly liên hệ
@endsection()
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">message</th>
      <th scope="col">ngày</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($contacts as $contact)
    <tr>
      <th scope="row">{{ $contact->name }}</th>
      <td>{{ $contact->email }}</td>
      <td>{{ $contact->phone }}</td>
      <td>{{ $contact->message }}</td>
      <td>{{ $contact->created_at }}</td>
      <td>
          <form action="{{ route('admin.contact.delete') }}" method="post">
              @csrf
              <input type="hidden" value="{{ $contact->id }}" name="id">
              <button type="submit" name="submit" class="btn btn-danger">xoá</button>
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection()
