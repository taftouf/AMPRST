@extends('layouts.adminMaster')

@section('content')


<!-- nbr des adherents -->
<div class="container">
    <div class="card-header"></div>
    <div class="row mt-4">
        <div class="col-4 position-relative " style="left: 100px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nombre des adherents </h5>
                    <p class="card-text">
                            <center>{{ $nbrAdherents }}</center>
                    </p>
                </div> 
            </div>
       </div>
 
 <!-- nbr des visiteurs -->
        <div class="col-4 position-relative " style="left: 200px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nombre des visiteurs </h5>
                    <p class="card-text">
                            <center>{{ $nbrVisiteurs }}</center>
                    </p>
                </div> 
            </div>
       </div>
    </div> 




 <!-- table des evenements -->
    <div class="row  mt-4">
      <div class="col-md-12">

         <div class="col-4 position-relative mb-3" style="left: 640px;"> 
               <!-- bare de recherche -->
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher des titres .." title="Type in a name">
            </div>

         <table class="table" id="myTable">
            <head>
                <tr>
                   <th> <b>Evenements</b></th>
                   <th> <b>Date début</b></th>
                   <th> <b> nombre des participants</b></th>
                   
               </tr>
            </head>
            <body>
                 @foreach($events as $event)
                <tr>
                    <td> {{$event->title}} </td>
                    <td> {{$event->start_date}} </td>
                    <td> {{count($event->users)}} </td>
                </tr>
                @endforeach
            </body>
         </table>
      </div>
    </div>
    <?php echo $events->links(); ?>
</div>

@endsection


