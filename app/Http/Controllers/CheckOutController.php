<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class CheckOutController extends Controller
{
    public function checkout(Request $request){
        if( Auth::check() == false ){
            return redirect()->route('auth.login');
        }
        else{
            $data = [
                $total_price = Cart::subtotal(),
                $user_id = Auth::id(),
                $phone = $request->phone,
                $address = $request->address,
                $status = "1",
            ];
            // send mail
            $oders = [
                'title' => 'đơn hàng của bạn',
                'username' => Auth::user()->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'totalPrice' => Cart::subtotal(),
            ];
            $emailLogin = Auth::user()->email;
            Mail::to($emailLogin)->send(new SendMail($oders));
            // dd($data);
            $result = Invoice::create(['user_id' => $user_id, 'phone' => $phone, 'address' => $address, 'total_price' => $total_price, 'status' => $status]);
            

        }
        $cart = Cart::content();
        // dd($cart);
        foreach($cart as $item){
            $InvoiceDetail = new InvoiceDetail;
            $InvoiceDetail->invoice_id = $result->id;
            $InvoiceDetail->product_id = $item->id;
            $InvoiceDetail->unit_price = $item->price;
            $InvoiceDetail->quantity = $item->qty;
            $InvoiceDetail->save();
        }
        Cart::destroy();
        return redirect()->route('cart')->with('checkoutsuccess','Bạn để ý mail xác nhận đơn hàng nha!');
    }
    public function oderstatus(){
        if(Auth::check() == false){
            return redirect()->route('auth.loginForm');
        }
        else{
            $id = Auth::id();
            $cart_status = Invoice::where('user_id', $id)->get();
            return view('pages.oderstatus',['cartStatus' => $cart_status]);
        }
        
    }
    // public function sendMail(){
    //     $oders = [
    //         'title' => 'đơn hàng của bạn',
    //         'body' => 'sp1'
    //     ];
    //     Mail::to('tmqzuang244@gmail.com')->send(new SendMail($oders));
    //     return "email sended";
    // }
    
}
