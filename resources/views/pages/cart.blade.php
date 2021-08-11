@extends('welcome')
@section('content')
<div class="clearfix">
        </div>
        <div class="page-index">
          <div class="container">
            <p>
              Home - Shopping Cart
            </p>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container shopping-cart">
        @if (session('deleted'))
            <div class="alert alert-success">
                {{ session('deleted') }}
            </div>
        @endif
          <div class="row">
            <div class="col-md-12">
              <h3 class="title">
                Shopping Cart
              </h3>
              <div class="clearfix">
              </div>
              <table class="shop-table">
                <thead>
                  <tr>
                    <th>
                      Image
                    </th>
                    <th>
                      Dtails
                    </th>
                    <th>
                      Price
                    </th>
                    <th>
                      Quantity
                    </th>
                    <th>
                      Tổng giá sản phẩm
                    </th>
                    <th>
                      Delete
                    </th>
                  </tr>
                </thead>
                @if(Cart::count() > 0)
                <tbody>
                  @foreach( Cart::content() as $cart_item )
                  <tr>
                    <td>
                    <img src="{{asset('images')}}/{{$cart_item->options->image}}" alt="Product Name" style="height: 50px">
                    </td>
                    <td>
                      <div class="shop-details">
                        <div class="productname">
                          {{ $cart_item->name }}
                        </div>
                        <p>
                          <img alt="" src="images/star.png">
                          <a class="review_num" href="#">
                            02 Review(s)
                          </a>
                        </p>
                        <div class="color-choser">
                          <span class="text">
                            Product Color : 
                          </span>
                          <ul>
                            <li>
                              <a class="black-bg " href="#">
                                black
                              </a>
                            </li>
                            <li>
                              <a class="red-bg" href="#">
                                light red
                              </a>
                            </li>
                          </ul>
                        </div>
                        <p>
                          Product Code : 
                          <strong class="pcode">
                            Dress 120
                          </strong>
                        </p>
                      </div>
                    </td>
                    <td>
                      <h5>
                        {{$cart_item->price}}
                      </h5>
                    </td>
                    <td>
                      <form action="{{ route('updateCartItem') }}" method="post">
                        @csrf
                          <input type="number" value="{{ $cart_item->qty }}" name="qty" style="width: 60px">
                          <input type="hidden" value="{{ $cart_item->rowId }}" name="rowId">
                          <input type="submit" name="submit" class="" value="sửa">
                      </form>
                    </td>
                    <td>
                      <strong>
                        <h5>
                          {{ number_format($total = $cart_item->qty * $cart_item->price ) }}
                        </h5>
                      </strong>
                    </td>
                    <td>
                      <a href="{{ route('deleteItem',[ 'id' => $cart_item->rowId ]) }}" ><img src="https://img.icons8.com/material-outlined/24/000000/trash--v2.png"/></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                @else
                    <tbody>
                      <tr><td><h3>ban chua co san pham trong gio hang</h3></td></tr>
                    </tbody>
                  @endif
                  @if (session('checkoutsuccess'))
                      <div class="alert alert-success">
                          {{ session('checkoutsuccess') }}
                      </div>
                  @endif
                <tfoot>
                  <tr>
                    <td colspan="6">
                        <a href="{{ route('home') }}">
                        <button class="pull-left">
                        Continue Shopping
                        </button>
                        </a>
                        <a href="{{ route('deleteAllItem') }}">
                        <button class=" pull-right">
                        Xoá hết
                      </button>
                      </a>
                    </td>
                  </tr>
                </tfoot>
              </table>
              <div class="clearfix">
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="shippingbox">
                    <h5>
                      Discount Codes
                    </h5>
                    <form>
                      <label>
                        Enter your coupon code if you have one
                      </label>
                      <input type="text" name="">
                      <div class="clearfix">
                      </div>
                      <button>
                        Get A Qoute
                      </button>
                    </form>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="shippingbox">
                    <div class="subtotal">
                      <h5>
                        Tổng tiền
                      </h5>
                      <span>
                        {{ Cart::subtotal() }}
                      </span>
                    </div>
                    <button type="button"  data-toggle="modal" data-target="#checkout">
                      Process To Checkout
                    </button>
                    <div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('checkout') }}" method="post">
                              @csrf
                              <label for="">Nhập số điện thoại</label>
                              <input type="text" name="phone" class="form-control">
                              <label for="">Nhập số địa chỉ nhận hàng</label>
                              <input type="text" name="address" class="form-control">
                              <input type="hidden" value="{{ Cart::subtotal() }}" name="total_price">
                              <input type="hidden" value="1" name="status">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" name="submit" class="btn btn-secondary">Thanh toán</button>
                            </form>
                          </div>
                        </div>
                      </div>
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