<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Hash;
use App\Rules\Password;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('adherent');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
            $user = Auth::user();
            $events=$user->events;
            return view('adherent.home',compact('user','events'));
    }

    public function edit(User $user)
    {
            if(Auth::user()->id != $user->id)
                return redirect('home');
            return view('adherent.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'numeric'],
            'dateNaissance' => ['required', 'date'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        $user->update($data);

        return redirect('home');
    }

    public function editPass(User $user)
    {
        return view('adherent.editPass',compact('user'));
    }

    public function updatePass(User $user)
    {
        $data = request()->validate([
            'AncienPassword'  => ['required', 'string', 'min:8', new Password],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update(['password'=> Hash::make($data['password'])]);
        return redirect('home');
    }


    public function destroy(Request $request)
    {
        Auth::user()->events()->detach($request->event);
        
        return back();
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $user->events()->attach($request->event);
        
        return back();
    }
    
}