<!DOCTYPE html>
<html>
@include('includes.head')
<body>

<!-- Wrapper -->
<div id="wrapper">
    <?php $a=Auth::user()->accesslevel;
    if ($a>0){ ?>
    <!-- Header -->
    <header id="header">
        <h1 align="center">Very secret much admin</h1>
            <span class="info">
                TU  <strong>{{ Auth::user()->name }}</strong> ESI KIEČIAUSIAS ADMINAS<br>
            </span>
    </header>

    <!-- Main -->
    <section id="main">
        <h1>Administravimas</h1>
        <h2>Pridėti užduotį</h2>
        <form action="{{ URL::to('prideti_uzduoti') }}" method="post">

            Rūšis: <input type="text" name="rusis" id="rusis">
            Pavadinimas: <input type="text" name="pavadinimas" id="pavadinimas">
            Aprašymas: <input type="text" name="aprasymas" id="aprasymas">
            Taškų kiekis: <input type="text" name="taskai" id="taskai"><br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" value="Pridėti" name="submit">
        </form>
        <h2>Patvirtinti įkėlimus</h2>
        <table>
            <tr>
                <td>Įkėlimo data</td>
                <td>Foto</td>
                <td>Skiriami taškai</td>
                <td></td>
                <td></td>
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
        <?php }?>
        <br>
        @include('includes.navigation')
    </section>
    <!-- Footer -->
     @include('includes.footer')

</div>

</body>

@include('includes.scripts')
