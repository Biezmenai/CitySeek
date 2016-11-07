@extends('layouts.admin')

@section('title', 'Redaguoti renginius')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Renginiai</h4>
        <hr class="w3-clear">
        <table class="w3-table w3-striped">
            <tr>
                <th>Pavadinimas</th>
                <th>Kūrėjas</th>
                <th>Tipas</th>
                <th>Pradžios data</th>
                <th>Pabaigos data</th>
                <th>Sukurta</th>
                <th>Atnaujinta</th>
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
                    <td title="{{$event->created_at}}">{{$event->created_at->diffForHumans()}}</td>
                    <td title="{{$event->updated_at}}">{{$event->updated_at->diffForHumans()}}</td>
                    <td><a href="events/edit/{{$event->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    <td><a onclick="return confirm('Ar tikrai ištrinti šį įrašą?')" href="events/delete/{{$event->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
            @endforeach
            </table>
    </div>
@stop