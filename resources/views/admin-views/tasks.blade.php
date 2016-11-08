@extends('layouts.admin')

@section('title', 'Užduotys renginiams')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Renginiai</h4>
        <hr class="w3-clear">
        <table class="w3-table w3-striped w3-margin-bottom">
            <tr>
                <th>Pavadinimas</th>
                <th>Kūrėjas</th>
                <th>Tipas</th>
                <th>Pradžios data</th>
                <th>Pabaigos data</th>
                <th>Užduočių</th>
                <th></th>
            </tr>
            @foreach ($events as $key => $event)
                <tr>
                    <td>{{$event->title}}</td>
                    <td>{{$event->user->name}}</td>
                    <td>{{$event->eventType}}</td>
                    <td>{{$event->start}}</td>
                    <td>{{$event->end}}</td>
                    <td>{{$task_count[$key]}}</td>
                    <td><a href="/admin/tasks/event/{{$event->id}}"><i title="Užduotys" class="fa fa-list" aria-hidden="true"></i></a></td>
                </tr>
            @endforeach
        </table>
    </div>
@stop