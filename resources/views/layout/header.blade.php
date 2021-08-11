<div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-md-2 col-sm-2">
                     <div class="logo"><a href="{{route('home')}}"><img src="{{asset('inc/images/logo.png')}}" alt="FlatShop"></a></div>
                  </div>
                  <div class="col-md-10 col-sm-10">
                     <div class="header_top">
                        <div class="row">
                           <div class="col-md-3">
                              <ul class="option_nav">
                                 <li class="dorpdown">
                                    <a href="#">Eng</a>
                                 </li>
                                 <li class="dorpdown">
                                    <a href="#">USD</a>
                                 </li>
                              </ul>
                           </div>
                           <div class="col-md-6">
                              <ul class="topmenu">
                                 <li><a href="#">About Us</a></li>
                                 <li><a href="#">News</a></li>
                                 <li><a href="#">Service</a></li>
                                 <li><a href="#">Recruiment</a></li>
                                 <li><a href="#">Media</a></li>
                                 @if( Auth::check() == true )
                                 <li>
                                    <form action="{{route('auth.logout')}}" method="POST">
                                       @csrf
                                       <input type="submit" value="đăng xuất">
                                       </form>
                                 </li>
                                 @endif
                              </ul>
                           </div>
                           <div class="col-md-3">
                              <ul class="usermenu">
                                 <li><a href="{{ route('auth.loginForm') }}" class="log">Login</a></li>
                                 <li><a href="{{ route('auth.register') }}" class="reg">Register</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="header_bottom">
                        <ul class="option">
                           <li id="search" class="search">
                              <form><input class="search-submit" type="submit" value=""><input class="search-input" placeholder="Enter your search term..." type="text" value="" name="search"></form>
                           </li>
                           <li class="option-cart">
                              <a href="{{ route('cart') }}" class="cart-icon">cart <span class="cart_no">{{ Cart::count() }}</span></a>
                              <ul class="option-cart-item">
                                 @foreach( Cart::content() as $cart_item )
                                 <li>
                                    <div class="cart-item">
                                       <div class="image"><img src="{{asset('images')}}/{{$cart_item->options->image}}" alt="Product Name" style="height: 50px"></div>
                                       <div class="item-description">
                                          <p class="name">{{$cart_item->name}}</p>
                                          <p>Quantity: <span class="light-red">{{$cart_item->qty}}</span></p>
                                       </div>
                                       <div class="right">
                                          <p class="price">{{ $cart_item->price }}</p>
                                          <a href="{{ route('deleteItem',[ 'id' => $cart_item->rowId ]) }}" ><img src="https://img.icons8.com/material-outlined/24/000000/trash--v2.png"/></a>
                                       </div>
                                    </div>
                                 </li>
                                 @endforeach
                                 <li><span class="total">Total <strong>{{ Cart::subtotal() }}</strong></span></li>
                              </ul>
                           </li>
                        </ul>
                        <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                        <div class="navbar-collapse collapse">
                           <ul class="nav navbar-nav">
                              <li class="active dropdown">
                                 <a href="{{route('home')}}" >Home</a>
                              </li>
                              <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Fashion</a>
                                 <div class="dropdown-menu mega-menu">
                                    <div class="row">
                                       <div class="col-md-6 col-sm-6">
                                          <ul class="mega-menu-links">
                                             <li><a href="productgird.html">Danh mục sản phẩm</a></li>
                                             @foreach($categorys as $category)
                                             <li><a href="{{ route('get_pro_cate',['id' => $category->id]) }}">{{ $category->name }}</a></li>
                                             @endforeach
                                          </ul>
                                       </div>
                                       <div class="col-md-6 col-sm-6">
                                          <ul class="mega-menu-links">
                                             <li><a href="productgird.html">Thương hiệu</a></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li><a href="{{ route('cart') }}">Giỏ hàng</a></li>
                              @if(Auth::check() == true)
                              <li><a href="{{ route('oderstatus') }}">Tình trạng đơn hàng</a></li>
                              @endif
                              <li><a href="{{route('contact')}}">contact us</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>