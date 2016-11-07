@extends('layouts.admin')

@section('title', 'Redaguoti ranką')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Redaguoti ranką</h4>
        <hr class="w3-clear">
        <form class="span12" action="/admin/ranks/edit/{{$rank->id}}/submit" method="POST" enctype="multipart/form-data">
            <label>Titulas:</label> <input class="w3-input" type="text" name="rank" id="rank" value="{{$rank->rank}}"><br>
            <label>Taškai nuo:</label> <br>
            <input type="number" name="start_score" min="0" value="{{$rank->start_score}}"><br>
            <label>Taškai iki:</label> <br>
            <input type="number" name="end_score" min="0" value="{{$rank->end_score}}"><br>
            <label>Badge</label><br>
            <img src="/images/thumbs/ranks/{{$rank->badge}}.png"/>
            <br>
            <button type="submit" class="btn btn-primary w3-margin-top">Išsaugoti</button>
        </form>
        <br>
    </div>
@stop