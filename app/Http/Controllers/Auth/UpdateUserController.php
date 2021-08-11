<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class UpdateUserController extends Controller
{
    public function index(){
        if(Auth::check() == false){
            return redirect()->route('auth.loginForm');
        }
        $user = Auth::user();
        return view('auth.profile',['user' => $user]);
    }
}
