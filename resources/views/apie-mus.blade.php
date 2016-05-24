<!DOCTYPE html>


<html>
<head>
    <title>&copy; CitySeek Kaunas</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<header>
    <div>
       <h1 align="center"> Orientacinių varžybų sistema CitySeek Kaunas </h1>
    </div>
</header>
<body>
<!-- Main -->
<section id="main">
    <h2 align="center">Apie sistemos kurėjus</h2>
    <table>
        <tr>

            <td>Vardas</td>
            <td>Grupė</td>
            <td> </td>
        </tr>
        @foreach( $users as $key => $h)
            <tr>
                <td>{{ $h->name }}</td> <td>{{"IF-4/9"}}</td> <td><img src="{{ $h->avatar }}" alt=""/> </td>
            </tr>
        @endforeach

    </table>

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

        </div>
        <div>
            <a href="/uzduotys">
                <img src="images/thumbs/tasks.png" alt="" />
                <h3>Vykdyti užduotis</h3>
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


<!--  Footer   -->
<footer id="footer">
    <p>&copy; CitySeek </a>.</p>
</footer>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.poptrox.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>