<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreProRequest;
use App\Http\Requests\Admin\Product\UpdateProRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Validator;
class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(8);
        $cate_id = Category::all();
        $products->load(['category']);
        return view('adminapp.product.index',[ 'products' => $products , 'cates' => $cate_id]);
    }
    public function create(){
        $cate_id = Category::all();
        return view('adminapp.product.create',['cates' => $cate_id]);
    }
    // public function store( StoreProRequest $request){
    //     $product = new Product;
    //     if($request->file()){
    //         $image = time().'_'.$request->img->getClientOriginalName();
    //         // $imageName = time().'.'.$request->img->extension(); 
    //         $product = $request->all();
    //         $product['img'] = $image;
    //         // dd($product);
    //         $request->img->move(public_path('images'), $image);
    //         // dd($filePath);
    //         $result = Product::create($product);
    //         return redirect()->route('admin.product.index')->with('success','thêm sp thành công');
    //     }
        
        
    //     // dd($product);
    //     // $products = Product::create($product);
    //     // return redirect()->route('admin.product.index');
    // }
    public function store( StoreProRequest $request ){
        $product = new Product;
        
        if($request->file()){
            $image = time().'.'.$request->img->extension();
            $request->img->move(public_path('images'), $image);
            $data = ['name' => $request->name,'price' => $request->price,'quantity' => $request->quantity,'description' => $request->description,'category_id' => $request->category_id,'img' => $image];
            $result = Product::create($data);
            return response()->json(['data' => $result, 'success' => 'Thêm sản phẩm thành công']);
        }
        return response()->json(['error' => 'them san pham khong thanh cong']);
    }
    
    public function edit($id){
        $cate_id = Category::all();
        $product = Product::find($id);
        // return view('adminapp.product.edit' ,['cates' => $cate_id, 'product' => $product]);
        return response()->json(['data' => $product]);
    }
    public function update($id, UpdateProRequest $request){
        $data = Product::find($id);
        if($request->file()){
            $imageName = time().'.'.$request->img->extension();
            // dd($imageName);
            
            $product = $request->all();
            $product['img'] = $imageName;
            $request->img->move(public_path('images'), $imageName);
            $data->update($product);
            $data->load(['category']);
            return response()->json(['data' => $data, 'message' => 'thay đổi thành công']);
        }
        $product = $request->all();
        $product['img'] = $data->img;
        // dd($product);
        $data->update($product);
        $data->load(['category']);
        // return redirect()->route('admin.product.index');
        return response()->json(['data' => $data, 'message' => 'Bạn không thay đổi ảnh, hệ thống giữ nguyên ảnh cũ']);
    }
    public function delete($id){
        $product = Product::find($id);
        // dd($product);
        $product->delete();
        // return redirect()->route('admin.product.index');
        return response()->json(['message' => 'Bạn đã xoá thành công']);
    }
    public function search(Request $request){
        if($request->ajax())
        {
            $output = '';
            $nameSearch = $request->name;
            if($nameSearch != '')
            {
                $products = Product::where('name', 'LIKE', '%'. $nameSearch .'%')->get();
            }
            else
            {
                $products = Product::all();
            }
            $total_row = $products->count();
            if($total_row > 0){
                foreach($products as $key => $product){
                            $output .= '<tr id="row_' . $product->id . '">
                                    <th scope="row">'. $product->id .'</th>
                                    <td>'. $product->name .'</td>
                                    <td>'. $product->img .'</td>
                                    <td>'. $product->price .'</td>
                                    <td>'. $product->description .'</td>
                                    <td>'. $product->category->name .'</td>
                                    <td><a href="" class="btn btn-warning" data-id="'.$product->id.'" data-toggle="modal" data-target="#edit-product"  onclick="editProduct(event.target)">update</a><a href="javascript:void(0)" data-id="'. $product->id .'"  onclick="deleteProduct(event.target)" class="btn btn-danger">delete</a></td>
                                </tr>';
                        }
            }
            else{
                $output = '
                    <tr>
                        <td align="center" colspan="5">No data found
                        </td>
                    </tr>
                ';
            }
            
            return response()->json($output);
        }
    }
}
// if($products){
//     foreach($products as $key => $product){
//         $output .= '<tr id="row_' . $product->id . '">
//                 <th scope="row">'. $product->id .'</th>
//                 <td>'. $product->name .'</td>
//                 <td>'. $product->img .'</td>
//                 <td>'. $product->price .'</td>
//                 <td>'. $product->description .'</td>
//                 <td>'. $product->category->name .'</td>
//                 <td><a href="" class="btn btn-warning" data-id="'.$product->id.'" data-toggle="modal" data-target="#edit-product"  onclick="editProduct(event.target)">update</a><a href="javascript:void(0)" data-id="'. $product->id .'"  onclick="deleteProduct(event.target)" class="btn btn-danger">delete</a></td>
//             </tr>';
//     }
// }