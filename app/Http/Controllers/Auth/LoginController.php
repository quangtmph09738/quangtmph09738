<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\Auth\LoginRequest;
class LoginController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    public function login(LoginRequest $request){
        $data = $request->only([
            'email',
            'password'
        ]);
        $result = Auth::attempt($data); //dang nhap true or false
        if($result === false){
            session()->flash('error', 'sai ten dang nhap hoac mat khau');
            return back();
        }
        $user = Auth::user();
        return redirect()->route('admin.dashboard');
    }
    public function logout(Request $request){
            Auth::logout();
            return redirect()->route('auth.loginForm');
    }
    
}
