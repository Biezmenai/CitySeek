@extends('layouts.admin')

@section('title', 'Rankai')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Rankai</h4>
        <hr class="w3-clear">
        <div class="table-responsive w3-margin-bottom">
            <table class="w3-table w3-striped">
                <tr>
                    <th>ID</th>
                    <th>Taškų range</th>
                    <th>Pavadinimas</th>
                    <th>Badge</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($ranks as $rank)
                    <tr>
                        <td>{{$rank->id}}</td>
                        <td>Nuo {{$rank->start_score}} iki {{$rank->end_score}}</td>
                        <td>{{$rank->rank}}</td>
                        <td><img src="/images/thumbs/ranks/{{$rank->badge}}.png"/></td>
                        <td><a href="/admin/ranks/edit/{{$rank->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        <td><a onclick="return confirm('Ar tikrai ištrinti šį ranką?')" href="/admin/ranks/delete/{{$rank->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                @endforeach
            </table>
         </div>
    </div>
@stop