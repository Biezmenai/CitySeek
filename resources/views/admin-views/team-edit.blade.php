@extends('layouts.admin')

@section('title', 'Redaguoti komandą')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Redaguoti komandą</h4>
        <hr class="w3-clear">
        <form class="span12" action="/admin/teams/edit/{{$team->id}}/submit" method="POST" enctype="multipart/form-data">
            <label>Pavadinimas:</label> <input class="w3-input" type="text" name="name" id="name" value="{{$team->name}}"><br>
            <label>Nariai:</label> <br>
            <ul>
                @foreach($team->members as $member)
                    <li>{{$member->name}}

                        @if ($team->captain == $member->id)
                            <i title="Current captain" class="fa fa-star w3-margin-right" aria-hidden="true"></i>
                        @else
                            <a onclick="return confirm('Ar tikrai pakeisti komandos kapitoną?')" href="/admin/teams/edit/{{$team->id}}/change-captain/{{$member->id}}"><i title="Make captain" class="fa fa-star-o w3-margin-right" aria-hidden="true"></i></a>
                        @endif
                        <a onclick="return confirm('Ar tikrai pašalinti vartotoją iš komandos?')" href="/admin/teams/edit/{{$team->id}}/remove-member/{{$member->id}}"><i title="Remove member from team" class="fa fa-trash" aria-hidden="true"></i></a>
                    </li>

                @endforeach
            </ul>
            <label>Nuotrauka/logotipas</label> (Nedidesnė nei 10MB dydžio, bei 200x200px rezoliucijos)
            <div class="image-upload w3-margin-bottom">
                <label title="Change picture" onmouseover="style='cursor:pointer'" for="img">
                    <img src="{{$team->image}}"/>
                </label>
                <input onchange="style='display: block;'" type="file" name="img" id="img"/>
            </div>
            <label>Slaptas kodas</label><br>
            {{$team->secret}} <a onclick="return confirm('Ar tikrai pakeisti komandos kodą?')" href="/admin/teams/edit/{{$team->id}}/regenerate-secret"><i title="Generate new secret" class="fa fa-refresh" aria-hidden="true"></i></a>
            <br>
            <button type="submit" class="btn btn-primary w3-margin-top">Išsaugoti</button>
        </form>
        <br>
    </div>

    <style>
        .image-upload > input
        {
            display: none;
        }
    </style>
@stop