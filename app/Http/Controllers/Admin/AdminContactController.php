<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class AdminContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('adminapp.contact.index',['contacts' => $contacts]);
    }
    public function deletecontact(Request $request){
        $id = $request->id;
        $result = Contact::find($id);
        $result->delete();
        return redirect()->route('admin.contact.index');
    }
}
