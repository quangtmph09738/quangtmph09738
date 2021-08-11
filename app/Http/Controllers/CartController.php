<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
class CartController extends Controller
{
    public function addtocart(Request $request){
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $id = $request->id;
        $product = Product::find($id);
        // dd($product);
        $data['id'] = $product->id;
        $data['qty'] = $request->qty;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['weight'] = "100";
        $data['options']['image'] = $product->img;
        // dd($data);
        Cart::add($data);
        return back()->with('success', 'đã thêm sản phẩm này vào giỏ hàng!');
    }
    public function getCart(){
        return view('pages.cart');
    }
    public function deleteCartItem($id){
        $rowId = $id;
        // dd($rowId);
        Cart::remove($rowId);
        return redirect()->route('cart')->with('deleted',' đã xoá sản phẩm khỏi giỏ hàng của bạn!');
    }
    public function deleteAllCartItem(){
        Cart::destroy();
        return redirect()->route('cart');
    }
    public function update_Cart_Item(Request $request){
        $rowId = $request->rowId;
        $quantity = $request->qty;
        Cart::update($rowId, $quantity);
        return redirect()->route('cart');
    }
}
