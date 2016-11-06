@extends('layouts.new')

@section('title', 'Komanda')

@section('content')

    <div class="w3-panel w3-card-2 w3-theme-d2">
        <h3>Komandos puslapis</h3>
    </div>
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
            <h4>{{$team->name}}</h4>
            <hr class="w3-clear">

        </div>
@stop