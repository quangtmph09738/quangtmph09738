@extends('welcome')
@section('content')
<div class="clearfix">
        </div>
        <div class="page-index">
          <div class="container">
            <p>
              Home - Trạng thái đơn hàng
            </p>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container shopping-cart">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title">
                Tình trạng đơn hàng
              </h3>
              <div class="clearfix">
              </div>
              <table class="shop-table">
                <thead>
                  <tr>
                    <th>
                      Họ tên      
                    </th>
                    <th>
                      Số điện thoại
                    </th>
                    <th>
                      Địa chỉ  
                    </th>
                    <th>
                      Trạng thái
                    </th>
                    <th>
                    Tổng tiền
                    </th>
                    <th>
                      Ngày mua
                    </th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach($cartStatus as $status)
                  <tr>
                    <td>
                        {{ Auth::user()->name }}
                    </td>
                    <td>
                        {{ $status->phone }}
                    </td>
                    <td>
                    {{ $status->address }}
                    </td>
                    <td>
                    {{ $status->status  }}
                    </td>
                    <td>
                    {{ $status->total_price }}
                    </td>
                    <td>
                    {{ $status->created_at }}
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="clearfix">
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  
                </div>
                <div class="col-md-4 col-sm-6">
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="shippingbox">
                    <div class="subtotal">
                      <h5>
                        Tổng tiền
                      </h5>
                      <span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix">
          </div>
          
        </div>
      </div>
      <div class="clearfix">
@stop()