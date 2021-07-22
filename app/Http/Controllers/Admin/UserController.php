<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $list = User::all();
        return view('adminapp.users.index', [
            'users' => $list,
        ]);
    }
    public function create(){
        return view('adminapp.users.add');
    }
    public function store(){
        $data = request()->except('_token');
        $data['password'] = 1123123123;
        // dd($data);
        $result = User::create($data);
        return redirect()->route('admin.users.index');
    }
    public function edit($id){
        $data = User::find($id);
        return view('adminapp.users.edit',['data' => $data]);
    }
    public function update($id){
        $result = request()->except('_token');
        $data = User::find($id);
        $data->update($result);
        return redirect()->route('admin.users.index');
        }
    }
