@extends('layouts.adminMaster')

@section('content')


<div class="container">
    <div class="row">
      <div class="col-md-12">
         <H3>   </H3>
         <hr>
         <table class="table">
            <head>
                <tr>
                   <th> <b></b></th>
                   <th> <b></b></th>
                   
               </tr>
            </head>

        
            <body>
                <tr>
                    <td>Nom </td>
                    <td>{{ $user->nom }} </td>
                </tr>
                <tr>
                    <td>Prenom </td>
                    <td>{{ $user->prenom }} </td>
                </tr>
                <tr>
                    <td>Email </td>
                    <td>{{ $user->email }} </td>
                </tr>
                <tr>
                    <td>date de naissence </td>
                    <td>{{ $user->dateNaissance }} </td>
                </tr>
                <tr>
                    <td>Telephone </td>
                    <td>{{ $user->telephone }} </td>
                </tr>
                <tr>
                    <td> date d'inscription </td>
                    <td>{{ $user->created_at }} </td>
                </tr>
                
            </body>
         </table>
      </div>
    </div>
</div>



@endsection