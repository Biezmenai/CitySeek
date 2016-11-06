@extends('layouts.admin')

@section('title', 'Komandos')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Komandos</h4>
        <hr class="w3-clear">
        <table class="w3-table w3-striped">
            <tr>
                <th>Pavadinimas</th>
                <th>Nariai</th>
                <th>Sukurta</th>
                <th>Atnaujinta</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($teams as $team)
                <tr>
                    <td>{{$team->name}}</td>
                    <td>
                        @foreach($team->members as $member)
                            {{$member->name}}
                            @if ($team->captain == $member->id)
                                <i title="Captain" class="fa fa-star" aria-hidden="true"></i>
                            @endif
                            <br>
                        @endforeach
                    </td>
                    <td title="{{$team->created_at}}">{{$team->created_at->diffForHumans()}}</td>
                    <td title="{{$team->updated_at}}">{{$team->updated_at->diffForHumans()}}</td>
                    <td><a href="/admin/teams/edit/{{$team->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    <td><a onclick="return confirm('Ar tikrai ištrinti šią komandą?')" href="/admin/teams/delete/{{$team->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
            @endforeach
            <table>
    </div>
@stop