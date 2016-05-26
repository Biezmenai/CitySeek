<?php

namespace App\Http\Controllers;

use \Input as Input;
use App\User;
use App\Upload;
use Auth;
use DB;

class AdminController extends Controller
{

    public function prideti_uzduoti()
    {

        $callback3 = '
<!DOCTYPE html>
<html>
<head>
    <title>CitySeek Kaunas</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1 align="center">CitySeek Kaunas</h1>
Užduotis pridėta!<br>
        <a href="/admin">Grįžti į admino puslapį</a><br><br>

    </header>

    <!-- Main -->
    <section id="main">
        <h1>Navigacija</h1>
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

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.poptrox.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>


';

        echo $callback3;


        $users=DB::table('users')->get();

        foreach ($users as $user) {
            DB::table('tasks')->insert([

                ['rusis' => Input::get('rusis'), 'pavadinimas' => Input::get('pavadinimas'),
                    'aprasymas' => Input::get('aprasymas'), 'taskai' => Input::get('taskai'),
                    'vartotojas' => $user->facebook_id, 'busena' => '0'
                ]

            ]);
        }
    }

    public function patvirtinti()
    {

        $callback = '
<!DOCTYPE html>
<html>
<head>
    <title>CitySeek Kaunas</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1 align="center">CitySeek Kaunas</h1>
Užduotis patvirtinta!<br>
        <a href="/admin">Grįžti į admino puslapį</a><br><br>

    </header>

    <!-- Main -->
    <section id="main">
        <h1>Navigacija</h1>
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

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.poptrox.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>


';

        $users=DB::table('users')->get();
        foreach ($users as $user) {
            if ($user->facebook_id==Input::get("userid")){
               $taskaiuzduotis=$user->points;
            }
        }
        $taskaiuzduotis = $taskaiuzduotis + Input::get("taskaiuzduoti");

        echo $callback;
        DB::table('uploads')
            -> where('id', Input::get("id"))
            -> update(['busena' => 1]);
;
        DB::table('users')
            -> where('facebook_id', Input::get("userid"))
            -> update(['points' => $taskaiuzduotis]);

        /*DB::table('users')
            -> where('facebook_id', Input::get("userid"))
            -> update(['points' => ]);*/
    }

    public function decline()
    {

        $callback2 = '
<!DOCTYPE html>
<html>
<head>
    <title>CitySeek Kaunas</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1 align="center">CitySeek Kaunas</h1>
Užduotis atmesta!<br>
        <a href="/admin">Grįžti į admino puslapį</a><br><br>

    </header>

    <!-- Main -->
    <section id="main">
        <h1>Navigacija</h1>
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

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.poptrox.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>


';

        echo $callback2;
        DB::table('tasks')
            -> where('id', Input::get("task_id"))
            -> update(['busena' => 0]);
        DB::table('uploads')
            -> where('ikelikas', Input::get("userid"))->where('task_id',Input::get("task_id") )
            -> delete();
    }


}
