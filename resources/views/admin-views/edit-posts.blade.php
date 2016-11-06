@extends('layouts.admin')

@section('title', 'Redaguoti blogo įrašus')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Naujienų įrašai</h4>
        <hr class="w3-clear">
        <table class="w3-table w3-striped">
            <tr>
                <th>Pavadinimas</th>
                <th>Kūrėjas</th>
                <th>Sukurta</th>
                <th>Atnaujinta</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($news as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    <td title="{{$post->created_at}}">{{$post->created_at->diffForHumans()}}</td>
                    <td title="{{$post->updated_at}}">{{$post->updated_at->diffForHumans()}}</td>
                    <td><a href="edit-posts/edit/{{$post->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    <td><a onclick="return confirm('Ar tikrai ištrinti šį įrašą?')" href="edit-posts/delete/{{$post->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
            @endforeach
        <table>
    </div>
@stop