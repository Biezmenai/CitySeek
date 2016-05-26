<!DOCTYPE html>
<html>
<head>
    <title>Very secret much admin</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
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
        <br><h1>Navigacija</h1>
        <!-- Thumbnails -->
        <section class="thumbnails">
            <div>
                <a href="/home">
                    <img src="images/thumbs/home3.png" alt="" />
                    <h3>Grįžti į pradinį puslapį</h3>
                </a>
                <a href="/kontaktai">
                    <img src="images/thumbs/contact_us.png" alt="" />
                    <h3>Susisiekite su mumis</h3>
                </a>
                <?php $a=Auth::user()->accesslevel;
                if ($a>0){ ?>
                <a href="/admin">
                    <img src="images/thumbs/admin.png" alt="" />
                    <h3>Admin Area</h3>
                </a>
                <?php }?>
            </div>
            <div>
                <a href="/uzduotys">
                    <img src="images/thumbs/tasks.png" alt="" />
                    <h3>Vykdyti užduotis</h3>
                </a>
                <a href="/apie-mus">
                    <img src="images/thumbs/about_us.png" alt="" />
                    <h3>Apie mus</h3>
                </a>
            </div>
            <div>
                <a href="/informacija">
                    <img src="images/thumbs/event.png" alt="" />
                    <h3>Informacija apie renginį</h3>
                </a>
                <a href="/listing">
                    <img src="images/thumbs/listing.png" alt="" />
                    <h3>Turnyrinė lentelė</h3>
                </a>
            </div>
        </section>
    </section>


    <!-- Footer -->
    <footer id="footer">
        <p>&copy; CitySeek Kaunas </a>.</p>
    </footer>

</div>

</body>


<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.poptrox.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/main.js"></script>
