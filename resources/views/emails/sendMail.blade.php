@extends('layouts.adminMaster')

@section('content')


<div class="container box mt-5">
    <h3 align="center"> Nouveau message </h3><br />
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
   @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <form method="post" action="{{url('sendemail/send')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group">
            <label> Sujet </label>
            <input type="text" name="objet" class="form-control" value="" />
        </div>
        <div class="form-group">
                <label>Titre</label>
                <input type="text" name="titre" class="form-control" value="" />
        </div>
       
        <div class="form-group">
                <label>Entrez votre message</label>
                <textarea name="message" class="form-control"></textarea>
        </div>

        <div class="form-group">
                <label> ==> </label>
                <input type="file" name="fichier" class="" value="" />
        </div>
        <br>

        <div class="form-group">
            <input type="submit" name="send" class="btn btn-info" value="Envoyer" />
        </div>
        
    </form>

</div>


@endsection