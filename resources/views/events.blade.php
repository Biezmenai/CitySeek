@extends('layouts.new')

@section('title', 'Redaguoti renginius')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Ateinantys Renginiai</h4>
        <hr class="w3-clear">
        <table class="w3-table w3-striped">
            <tr>
                <th>Pavadinimas</th>
                <th>Kūrėjas</th>
                <th>Tipas</th>
                <th>Pradžios data</th>
                <th>Pabaigos data</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($events as $event)
                <tr>
                    <td>{{$event->title}}</td>
                    <td>{{$event->user->name}}</td>
                    <td>{{$event->eventType}}</td>
                    <td>{{$event->start}}</td>
                    <td>{{$event->end}}</td>
                    <td><a href="events/registration/{{$event->id}}">Registruotis</a></td>
                </tr>
            @endforeach
            </table>
    </div>

@stop