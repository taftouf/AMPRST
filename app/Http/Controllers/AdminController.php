<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function indexAdmin()
    {   
        
        if(date("d") == 1)
        {
            Storage::disk('local')->put('compteur_visites.txt', 0);
        }
        $nbrVisiteurs = (int)Storage::get('compteur_visites.txt');
        $nbrAdherents = User::where('isAdmin', 0)->count(); 
        $events = Event::paginate(10);
        return view('admin.adminHome',compact('nbrAdherents','events','nbrVisiteurs'));
    }

    public function index()
    {
        $users = User::paginate(10);

        return view('admin.index' , [
            'users' => $users
        ]);
    }
   
   
    public function destroy(User $user)
    {
       $user->delete();
       return redirect()->route('index');
    }
    

    public function detail(User $user)
    {
        return view('admin.detail', [
            'user' => $user
        ]);
    }


}
