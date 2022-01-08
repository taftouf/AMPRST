@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-5">Les evenements</h2>
    <div class="row">
        @foreach($events as $event)
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Titre : {{$event->title}}</h5>
                        <p class="card-text">
                            <ul>
                                <li>Date début : {{$event->start_date}}</li>
                                <li>Date fin : {{$event->end_date}}</li>
                            </ul>
                        </p>
                        <p class="card-text">Description : {{$event->description}}</p>
                        <form action="{{ route('participer.store') }}" method="post">
                            @csrf
                            <button class="btn btn-primary" name="event" value="{{ $event->id }}" type="submit">Participer</button>
                        </form>
                    </div> 
                </div>
            </div>
        @endforeach
    </div> 
</div>    
@endsection