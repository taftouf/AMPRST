<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Mail\AutoMail;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{ 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->eventsToArray(Event::all());
    }

    public function indexEvent()
    {
        $events = Event::All();
        $user = Auth::user();
        return view('Event.index', compact('events', 'user'));
    }

    public function eventsToArray($events){
        $eventsArray = [];
        foreach($events as $event){
            $data = [
                "title" => $event->title,
                "start" => $event->start_date,
                "end" => $event->end_date,
                "description"=>$event->description,
                "textColor" => "white"
            ];
            array_push($eventsArray,$data);
        }
        return response()->json($eventsArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Event::create([
            "title" => $request->title,
            "start_date" => $request->start,
            "end_date" => $request->end,
            "description"=>$request->description
        ]);
        
        $data = array(
            'object'    => 'Nouveau evenement ',
            'titre'     =>  $request->title,
            'message'   =>  $request->description,
        );

        $users = User::all();
        foreach($users as $user){
            if ($user->isAdmin == 0) {
                 Mail::to($user->email)->send(new AutoMail($data));
            }
        }
        return response()->json(['success'=>'added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
        return view('Event.show')->withEvent($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
        $event->update([
            "start_date" => $request->start,
            "end_date" => $request->end
        ]);
        
         $data = array(
            'object'    => 'Un evenement a ete modifier',
            'titre'     =>  $event->title,
            'message'   =>  $event->description,
        );

        $users = $event->users;
        foreach($users as $user){
                 Mail::to($user->email)->send(new AutoMail($data));
        }
        return response()->json(['success'=>'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        $data = array(
            'object'    => 'Un evenement a ete annuler',
            'titre'     =>  $event->title,
            'message'   =>  $event->description,
        );

        $users = $event->users;
        foreach($users as $user){
                 Mail::to($user->email)->send(new AutoMail($data));
        }

        $event->delete();
        
        return response()->json(['success'=>'deleted']);
    }
}