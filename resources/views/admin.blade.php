@extends('layouts.admin')

@section('title', 'Administravimo zona')

@section('content')
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
            <h4>Pridėti užduotį</h4>
            <hr class="w3-clear">
            <form action="{{ URL::to('prideti_uzduoti') }}" method="post" class="w3-container">

                Rūšis: <input class="w3-input" type="text" name="rusis" id="rusis">
                Pavadinimas: <input class="w3-input"type="text" name="pavadinimas" id="pavadinimas">
                Aprašymas: <input class="w3-input" type="text" name="aprasymas" id="aprasymas">
                Taškų kiekis: <input class="w3-input" type="text" name="taskai" id="taskai"><br>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input class="w3-btn" type="submit" value="Pridėti" name="submit">
            </form>
            <br>
        </div>

        <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
            <h4>Patvirtinti įkėlimus</h4>
            <hr class="w3-clear">
            <table class="w3-table w3-striped">
                <tr>
                    <th>Įkėlimo data</th>
                    <th>Foto</th>
                    <th>Skiriami taškai</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach( $upload as $id)
                    <tr>
                        <td>{{$id->created_at}}</td> <td><a href="http://cityseek.ml{{$id->link}}" target="_blank">http://cityseek.ml{{$id->link}}</a></td> <td>{{$id->taskaiuzduoti}}</td>
                        <td>

                            <form action="{{ URL::to('patvirtinti') }}" method="post">
                                <input type="submit" value="Patvirtinti" name="submit">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                <input type="hidden" value="{{$id->id}}" name="id" id="id">
                                <input type="hidden" value="{{$id->task_id}}" name="task_id" id="task_id">
                                <input type="hidden" value="{{$id->ikelikas}}" name="userid" id="userid">
                                <input type="hidden" value="{{$id->taskaiuzduoti}}" name="taskaiuzduoti" id="taskaiuzduoti">
                            </form>

                        </td>
                        <td>

                            <form action="{{ URL::to('decline') }}" method="post">
                                <input type="submit" value="Atšaukti" name="submit">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                <input type="hidden" value="{{$id->id}}" name="id" id="id">
                                <input type="hidden" value="{{$id->task_id}}" name="task_id" id="task_id">
                                <input type="hidden" value="{{$id->ikelikas}}" name="userid" id="userid">
                                <input type="hidden" value="{{$id->taskaiuzduoti}}" name="taskaiuzduoti" id="taskaiuzduoti">
                            </form>

                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
@stop
