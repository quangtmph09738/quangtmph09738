@extends('layout')
@section('content')
<div class="row">
    <div class="col-12">
    <table class="table table-stripped">
        <p>lịch sử mua hàng</p>
        <thead>
            <tr>
                <td>id</td>
                <td>product_id</td>
                <td>unit_price</td>
                <td>quantity</td>
                <td>created_at</td>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $detail)
                <tr>
                    <td>{{ $detail->id }}</td>
                    <td>{{ $detail->product_id }}</td>
                    <td>{{ $detail->unit_price }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection()