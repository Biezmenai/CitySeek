@extends('layouts.new')

@section('title', 'Informacija')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Apie mus</h4>
        <hr class="w3-clear">
        <table class="w3-table w3-striped">
                <tr>
                    <th>ID</th>
                    <th>Pavadinimas</th>
                    <th>Aprasymas</th>
                    <th>Pradzios laikas</th>
                    <th>Pabaigos laikas</th>
                    <th>Likes laikas</th>
                </tr>
                @foreach( $renginys as $id)
                    <tr>
                        <td>{{$id->id}}</td> <td>{{$id->name}}</td> <td>{{$id->aprasymas}}</td>
                        <td>{{$id->pradzios_data}}</td> <td>{{$id->pabaigos_data}}</td> <td>{{$id->likes_laikas}}</td>
                    </tr>
            @endforeach
        </table>
        <br>
    </div>
@stop