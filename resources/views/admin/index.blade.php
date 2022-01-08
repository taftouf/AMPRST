@extends('layouts.adminMaster')

@section('content')
<div class="container">
    <div class="row mt-5" >
        <div class="col-md-12">
            <h3 > Gestion des utilisateurs </h3>

            <div class="col-4 position-relative mb-3" style="left: 640px;">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher des noms .." title="Type in a name">
            </div>
          
            <table class="table" id="myTable">
                <thead class="thead-dark">
                    <head>
                        <tr>
                            
                        </tr>
                        <tr>
                            <th> <b> Nom </b></th>
                            <th> <b> Email </b></th>
                            <th> <b> Role </b></th>
                            <th> <b> Action </b></th>
                        </tr>
                    </head>
                </thead>
            
                <body>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->nom }}</td>
                            <td>{{ $user->email }}</td>
                            <td> 
                                @if( $user->isAdmin == 1) 
                                    Admin 
                                @else 
                                    Adherent
                                @endif
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <form action="{{ route('user.destroy',['user' => $user['id']]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf()
                                            
                                            <a href="{{ route('user.detail',['user' => $user['id']]) }}" class="btn btn-sm btn-primary">voir</a>
                                            @if( $user->isAdmin == 0) 
                                                <input type="submit" class="btn btn-sm btn-danger" value="Supprimer" onclick="return sure( '{{$user->nom}}');">
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </body>
            </table>
        </div>
    </div>
</div>
<?php echo $users->links(); ?>

@endsection