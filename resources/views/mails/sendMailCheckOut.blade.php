<div class="row">
    <div class="col-md-6 col-md-offset-3" id="form_container">
        <h2>Xin chào {{$oders['username']}}. Đây là {{$oders['title']}}</h2>
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
                    Tổng tiền
                    </th>
                    
                  </tr>
                </thead>
                <tbody>
                   
                  <tr>
                    <td>
                        {{ $oders['username'] }}
                    </td>
                    <td>
                    {{ $oders['phone'] }}
                    </td>
                    <td>
                    {{ $oders['address'] }}
                    </td>
                    <td>
                    {{ $oders['totalPrice'] }}
                    </td>
                  </tr>
                </tbody>
              </table>
    </div>
</div>