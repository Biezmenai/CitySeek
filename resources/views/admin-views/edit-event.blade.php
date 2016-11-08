@extends('layouts.admin')

@section('title', 'Naujo renginio kūrimas')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4> Redaguoti renginį</h4>
        <hr class="w3-clear">
        <form action="/admin/events/edit/{{$event->id}}/submit" method="post" class="w3-container">

            Pavadinimas: <input class="w3-input"type="text" name="title" id="title" value="{{$event->title}}">
            Aprašymas: <textarea class="w3-input" type="text" name="about" id="about">{{$event->about}}</textarea>
            Pradžios data: <input class="w3-input" type="datetime" name="start" id="start" value="{{$event->start}}">
            Pabaigos data: <input class="w3-input" type="datetime" name="end" id="end" value="{{$event->end}}">
            Rūšis: <select class="w3-select" name="eventType" selected="{{$event->eventType}}">
                @if($event->eventType=="one")
                    {
                         <option value="one"selected="selected">Renginys vienam asmeniui</option>
                         <option value="team">Komandinis renginys</option>
                    }
                @elseif($event->eventType=="team")
                {
                    <option value="one">Renginys vienam asmeniui</option>
                    <option value="team"selected="selected">Komandinis renginys</option>
                }
            @endif
            </select><br>
            <input class="w3-btn w3-margin-top" type="submit" value="Atnaujinti" name="submit">
        </form>
        <br>
    </div>
@stop