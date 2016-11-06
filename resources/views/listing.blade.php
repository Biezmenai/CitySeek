@extends('layouts.new')

@section('title', 'Turnyrinė lentelė')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Turnyrinė lentelė</h4>
        <hr class="w3-clear">
        <table class="w3-table w3-striped">
            <tr>
                <td>Vieta</td>
                <td>Vardas</td>
                <td>Taškai</td>
            </tr>
            @foreach( $users as $key => $h)
                <tr>
                    <td>{{$key+1}}</td> <td>{{ $h->name }}</td> <td>{{ $h->points }}</td>
                </tr>
            @endforeach
        </table>
        <br>
    </div>
@stop