<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Contact;

class ContactController extends Controller
{
    public function add(Request $request){
        $contast = new Contact();
        $contast->number_phone=$request->input('number_phone');
        $contast->email=$request->input('email');
        $contast->provider_id=$request->input('provider_id');

        $contast->add();
    }
}
