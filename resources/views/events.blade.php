@extends('layouts.new')

@section('title', 'Redaguoti renginius')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Ateinantys Renginiai</h4>
        <hr class="w3-clear">
        <table class="w3-table w3-striped">
            <tr>
                <th>Pavadinimas</th>
                <th>Tipas</th>
                <th>Pradžios data</th>
                <th>Pabaigos data</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($events as $key=>$event)
                <tr>
                    <td>{{$event->title}}</td>
                    @if( $event->eventType == "one")
                    <td>Renginys asmeniui</td>
                    @else
                        <td>Komandinis renginys</td>
                    @endif
                    <td>{{$event->start}}</td>
                    <td>{{$event->end}}</td>
                    @if($event->eventType=="one")
                        @if($ifRegistered[$key] == 0)
                            <td><a href="renginiai/registracija/{{$event->id}}">Registruotis</a></td>
                            @else
                            <td>Jūs jau prisiregistravę</td>
                            @endif

                    @elseif(Auth::user()->team > 0)
                        @if($ifRegisteredTeam[$key] == 0)
                            <td><a href="renginiai/komandos-registracija/{{Auth::user()->team}}/{{$event->id}}">Registruoti komandą</a></td>
                            @else
                            <td>Komanda jau priregistruota</td>
                        @endif
                           @else
                        <td>Nesate komandoje</td>
                            @endif
                    @if($ifRegisteredTeam[$key] != 0)
                        <td><a href="renginiai/issiregistravimas/{{Auth::user()->team}}/{{$event->id}}">išregistruoti komandą</a></td>
                        @endif
                    @if($ifRegistered[$key] != 0)
                        <td><a href="renginiai/issiregistravimas/{{$event->id}}">išsiregistruoti</a></td>
                        @endif
                </tr>
            @endforeach
            </table>
    </div>

@stop