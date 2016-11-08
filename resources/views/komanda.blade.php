
@extends('layouts.new')

@section('title', 'Komanda')

@section('content')
    <style>
        .image-upload > input
        {
            display: none;
        }
    </style>

    <script>
        function showButtons() {
            document.getElementById('img').style.display = 'block';
            document.getElementById('submit-pic').style.display = 'block';
        }
    </script>

    <div class="w3-panel w3-card-2 w3-theme-d2">
        <h3>Komandos puslapis</h3>
    </div>
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
            <h4>{{$team->name}}</h4>
            @if (Auth::user()->id == $team->captain)
                <form action="/komanda/{{$team->id}}/keisti-logo" method="post" enctype="multipart/form-data">
                    <div class="image-upload w3-margin-bottom">
                        <label title="Change picture" onmouseover="style='cursor:pointer'" for="img" class="w3-tooltip">
                            <img src="{{$team->image}}"/>
                            <span style="position:absolute;left:120px;bottom:-30px" class="w3-text w3-tag w3-animate-opacity">
                            Nauja nuotrauka negali būti didesnė nei 10MB dydžio, bei 200x200px rezoliucijos
                        </span>
                        </label>
                        <input onchange="showButtons()" type="file" name="img" id="img"/>
                        <input class="w3-btn w3-theme w3-margin" type="submit" value="Keisti logotipą" name="submit" id="submit-pic">
                    </div>
                </form>
            @else
                <img src="{{$team->image}}"/>
            @endif

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
                                        <a class="w3-margin-left" onclick="return confirm('DĖMESIO! Perdavę kapitono teises kitam nariui, jūs jas prarasite be galimybės grąžinti pakeitimą!')" href="/komanda/{{$team->id}}/keisti-kapitona/{{$member->id}}"><i title="Padaryti narį kapitonu" class="fa fa-star" aria-hidden="true"></i></a>
                                        <a onclick="return confirm('Ar tikrai pašalinti šį narį iš komandos?')" href="/komanda/{{$team->id}}/trinti-nari/{{$member->id}}"><i title="Pašalinti narį iš komandos" class="fa fa-times-circle" aria-hidden="true"></i></a>
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
                    <a onclick="return confirm('Ar tikrai pakeisti komandos kodą?')" href="/komanda/{{$team->id}}/keisti-koda"><i title="Generuoti naują kodą" class="fa fa-refresh fa-spin w3-margin-left" aria-hidden="true"></i></a>
                </div>
            @endif
        </div>

@stop