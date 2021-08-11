@extends('layout')
@section('content')
<div class="row">
    <div class="col-12 mt-5 mb-5">
        <div class="col-6">
            <label for="" class="col-3">Họ tên</label>
            <label for="" class="col-8">{{ $user_show->name }}</label>
        </div>
        <div class="col-6">
            <label for="" class="col-3">Email</label>
            <label for="" class="col-8">{{ $user_show->email }} ....</label>
        </div>
    </div>
    <div class="col-12">
    <table class="table table-stripped">
        <p>lịch sử mua hàng</p>
        <thead>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>phone</td>
                <td>address</td>
                <td>price</td>
                <td>invoice status</td>
                <td>created_At</td>
                <td>chi tiet</td>
            </tr>
        </thead>
        <tbody>
            @foreach($user_show->invoices as $invoice)
                <tr>
                    <td>{{$invoice->id}}</td>
                    <td>{{$user_show->name}}</td>
                    <td>{{$invoice->phone}}</td>
                    <td>{{$invoice->address}}</td>
                    <td>{{$invoice->total_price}}</td>
                    <td>
                        <form action="{{ route('admin.users.updateInvoiceStatus') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{$user_show->id}}" name="user_id">
                            <input type="hidden" value="{{$invoice->id}}" name="id">
                        <select name="status" class="form-control" id="status">
                            @foreach( config('common.invoice.status') as $statusName => $statusValue )
                            <option value="{{ $statusValue }}" >{{$statusName}}</option>
                            @endforeach
                        </select>
                        <input type="submit" name="submit" value="xác nhận" class="btn btn-success">
                        </form>
                    </td>
                    <td>{{$invoice->created_at}}</td>
                    <td>
                        <a href="{{ route('admin.users.showdetail',['id' => $invoice->id]) }}">xem</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection()