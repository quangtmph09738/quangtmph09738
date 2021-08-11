<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class HomeController extends Controller
{
    public function __contructor(){

    }
    public function index(){
        // $categories = Category::all();
        $products = Product::all();
        return view('pages.home',['products' => $products]);
    }
    public function detail($id){
        $result = Product::find($id);
        $cate_id = $result->category_id;
        $involve = Product::where('category_id',$cate_id)->paginate(3);
        // dd($involve);
        return view('pages.detail',['result' => $result, 'involve' => $involve]);
    }
    public function contact(){
        return view('pages.contact');
    }
    public function product_category($id){
        
        $products = Product::where('category_id', $id)->get();
        $cate = Category::find($id);
        return view('pages.danh_muc',['products' => $products, 'cate' => $cate]);
    }
}
