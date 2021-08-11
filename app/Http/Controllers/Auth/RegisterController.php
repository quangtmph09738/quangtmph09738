<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\User\StoreRequest;
class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function add_user(StoreRequest $request){
        $data = $request->all();
        $result = User::create($data);
        return redirect()->route('auth.register');
    }
}
