@extends('layouts.admin')

@section('title', 'Užduotys')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Renginio <b>{{$event->title}}</b> užduotys</h4>
        <a class="w3-right w3-btn w3-theme-l4" href="/admin/tasks/event/{{$event->id}}/add-task">Kurti naują</a>
        <hr class="w3-clear">

        <table class="w3-table w3-striped w3-margin-bottom">
            <tr>
                <th>Pavadinimas</th>
                <th>Tipas</th>
                <th>Taškai</th>
                <th>Sukurta</th>
                <th>Atnaujinta</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{$task->pavadinimas}}</td>
                    <td>{{$task->rusis}}</td>
                    <td>{{$task->taskai}}</td>
                    <td title="{{$task->created_at}}">{{$task->created_at->diffForHumans()}}</td>
                    <td title="{{$task->updated_at}}">{{$task->updated_at->diffForHumans()}}</td>
                    <td><a href="/admin/tasks/edit-task/{{$task->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    <td><a onclick="return confirm('Ar tikrai ištrinti šią užduotį?')" href="/admin/tasks/delete-task/{{$task->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
            @endforeach
        </table>
    </div>
@stop