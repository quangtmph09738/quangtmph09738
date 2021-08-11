<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
class UserController extends Controller
{
    public function index(){
        $list = User::paginate(5);
        // select * form invoices where user_id in (....)
        $list->load(['invoices']);
        /*
            trức khi gọi tới quan hệ trong vòng for phải dùng eager loading
        */
        // https://laravel.com/docs/8.x/eloquent-relationships#eager-loading
        return view('adminapp.users.index', [
            'users' => $list,
        ]);
    }
    public function show($id){
        $user_Show = User::find($id);
        // dd($user);
        return view('adminapp.users.show', ['user_show' => $user_Show]);
    }
    public function create(){
        // Gate
        // if( Gate::allows('creat-user', config('common.user.role.admin')) == false ){
        //     abord(403);
        // }
        return view('adminapp.users.add');
    }
    public function store(StoreRequest $request){
        $data = $request->except('_token');
        // dd($data);
        $result = User::create($data);
        return redirect()->route('admin.users.index');
    }
    public function edit($id){
        $data = User::find($id);
        return view('adminapp.users.edit',['data' => $data]);
    }
    public function update($id, UpdateRequest $request){
        $result = $request->except('_token');
        $data = User::find($id);
        $data->update($result);
        return redirect()->route('admin.users.index');
        }
        public function delete($id){
            $user = User::find($id);
            $user->delete();
            return redirect()->route('admin.users.index');
        }
        public function showdetail($id){
            // dd($id);
            $invoiceDetails = InvoiceDetail::where('invoice_id', $id)->get();
            
            return view('adminapp.users.detailcart', ['details' => $invoiceDetails]);
        }
        public function update_invoice_status(Request $request){
            $status = $request->all();
            $id = $request->id;
            $user_id = $request->user_id;
            $result = Invoice::find($id);
            $result->update($status);
            return redirect()->route('admin.users.show',['id' => $user_id]);
        }
    }
