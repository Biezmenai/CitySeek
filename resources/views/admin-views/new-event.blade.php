@extends('layouts.admin')

@section('title', 'Naujo renginio kūrimas')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Naujas renginys</h4>
        <hr class="w3-clear">
        <form action="{{ URL::to('/admin/new-event/add-event') }}" method="post" class="w3-container">

            Pavadinimas: <input class="w3-input"type="text" name="title" id="title">
            Aprašymas: <textarea class="w3-input" type="text" name="about" id="about"></textarea>
            Pradžios data: <input class="w3-input" type="datetime-local" name="start" id="start">
            Pabaigos data: <input class="w3-input" type="datetime-local" name="end" id="end">
            Rūšis: <select class="w3-select" name="eventType">
            <option value="team">Komandinis renginys</option>
            <option value="one">Renginys vienam asmeniui</option>
            </select><br>
            <input class="w3-btn  w3-margin-top" type="submit" value="Pridėti" name="submit">
        </form>
        <br>
    </div>
@stop