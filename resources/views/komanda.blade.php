
@extends('layouts.new')

@section('title', 'Komanda')

@section('content')

    <div class="w3-panel w3-card-2 w3-theme-d2">
        <h3>Komandos puslapis</h3>
    </div>
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
            <h4>{{$team->name}}</h4>
            <img src="{{$team->image}}">
            <p><a> Komanda sukurta {{$team->created_at}}</a></p>
            <hr class="w3-clear">
            <table class="w3-table">
                <tr>
                    <th>Komandos kapitonas</th>
                </tr>
                <tr>
                    @foreach($team->members as $member)
                        @if ($member->id == $team->captain)
                            <td><img class="w3-circle" style="vertical-align:middle" width="40px" src="{{ $member->avatar }}"> {{ $member->name }}</td>
                        @endif
                    @endforeach
                </tr>
            </table>
            <hr class="w3-clear">
            <table class="w3-table">
                <tr>
                    <th> Komandos nariai </th>
                </tr>
                @if ($team->members_count == 1)
                    <tr><td>Jūs esate vienintelis žmogus šioje komandoje<td></tr>
                @else
                    @foreach($team->members as $member)
                        <tr>
                            @if ($member->id != $team->captain)
                                <td><img class="w3-circle" style="vertical-align:middle" width="40px" src="{{ $member->avatar }}"> {{$member->name}}
                                    @if (Auth::user()->id == $team->captain)
                                        <a href="/komanda/{{$team->id}}/deletemember/{{$member->id}}"><i title="ištrinti" class="fa fa-times-circle" aria-hidden="true"></i></a>
                                        <a href="/komanda/{{$team->id}}/changecaptain/{{$member->id}}"><i title="Pakeisti kapitoną" class="fa fa-star" aria-hidden="true"></i></a>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            </table>
            <hr class="w3-clear">

            @if (Auth::user()->id == $team->captain)
                <div class="w3-center w3-margin">
                    <label> Komandos slaptas kodas yra: </label>
                    <b>{{$team->secret}}</b>
                    <a onclick="return confirm('Ar tikrai pakeisti komandos kodą?')" href="/komanda/{{$team->id}}/change-secret"><i title="Generuoti naują kodą" class="fa fa-refresh w3-margin-left" aria-hidden="true"></i></a>
                </div>
            @endif
        </div>

@stop