<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\StoreCateRequest;
use App\Http\Requests\Admin\Category\UpdateCateRequest;
class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('adminapp.category.index',['category' => $categories]);
    }
    public function create(){
        return view('adminapp.category.create');
    }
    public function store(StoreCateRequest $request){
        $data = $request->except('_token');
        $result = Category::create($data);
        // dd($result);
        return response()->json(['result' => $result, 'success' => 'thêm thành công'],200);
    }
    public function edit($id){
        $data = Category::find($id);
        // dd($data);
        return response()->json(['data' => $data]);
    }
    public function update(UpdateCateRequest $request, $id){
        // dd($id);
        $result = request()->except('_token');
        $data = Category::find($id);
        $data->update($result);
        return response()->json(['data'=> $data, 'message' => 'thay doi thanh cong']);
    }
    public function delete($id){
        // dd($id);
        $cate = Category::find($id);
        // dd($cate);
        $count_pro_cate = $cate->products->count();
        if($count_pro_cate == 0){
            $cate->delete();
            return response()->json(['success' => 'xoa thanh cong']);
            // return redirect()->route('admin.category.index');
        }
            return response()->json(['error' => 'danh muc ton tai sp']);
        
            // $mess = "không thể xoá danh mục vì tồn tại sản phẩm";
            // return redirect()->route('admin.category.index',$mess);
            
        
        
    }
}
