<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
class ContactController extends Controller
{
    public function contact(){
        return view('pages.contact');
    }
    public function putContact(Request $request){
        $data = $request->all();
        $result = Contact::create($data);
        return view('pages.contact');
    }
}
