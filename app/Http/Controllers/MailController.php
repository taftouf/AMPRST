<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class mailController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    function index()
    {
     return view('emails.sendMail');
    }

    function send(Request $request)
    {
     $this->validate($request, [
      'objet'   =>  'required',
      'titre'   =>  'required',
      'message' =>  'required',
      'fichier' =>  'mimes:jpeg,txt,pdf,png,jpg,ppt,docx,doc,xls,svg,gif'
     ]);

        $data = array(
            'objet'     =>  $request->objet,
            'titre'     =>  $request->titre,
            'fichier'   =>  $request->fichier,
            'message'   =>  $request->message
        );
     
    $users = User::all();
    
    foreach($users as $user){
        if ($user->isAdmin == 0) {
            Mail::to($user->email)->send(new SendMail($data));
        }    
    }
     return back()->with('success', 'message envoyé avec succès!');
    
    }
}