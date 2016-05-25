<?php

namespace App\Http\Controllers;

use \Input as Input;
use Illuminate\Http\Request;
use App\Upload;
use App\Task;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{

  public function ideti(){

    if(Input::hasFile('file')) {

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

    <a class="btn btn-info" href="padidinti" role="button">zS</a>
    <!-- Header -->
    <header id="header">
        <h1 align="center">CitySeek Kaunas</h1>
        Nuotrauka sėkimngai įkelta.<br>
        <a href="/uzduotys">Grįžti į užduočių puslapį</a><br><br>
        <ul class="icons">
            <li><a href="https://twitter.com/CitySeekKaunas" target="_blank" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="https://www.facebook.com/cityseekkaunas/" target="_blank" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="https://www.instagram.com/cityseekkaunas/?hl=en" target="_blank" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="mailto:cityseekinfo@gmail.com" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
        </ul>

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

        echo $callback;
        //echo '<a href="/home">grizti</a>';
        $file = Input::file('file');
        $file->move(Input::get('foldername'), Input::get("task_id").".jpg");

        Upload::create([
            'link' => Input::get('link').'/'.Input::get("task_id").".jpg",
            'ikelikas' => Input::get('owner'),
            'busena' => '0',
            'task_id' => Input::get("task_id"),
            'taskai' => Input::get('taskai')
        ]);
        DB::table('tasks')
            -> where('id', Input::get("task_id"))
            -> update(['busena' => 1]);
    }
      else {
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

    <a class="btn btn-info" href="padidinti" role="button">zS</a>
    <!-- Header -->
    <header id="header">
        <h1 align="center">CitySeek Kaunas</h1>
Nepavyko įkelti nuotraukos!!!!!<br>
        <a href="/uzduotys">Grįžti į užduočių puslapį</a><br><br>
        <ul class="icons">
            <li><a href="https://twitter.com/CitySeekKaunas" target="_blank" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="https://www.facebook.com/cityseekkaunas/" target="_blank" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="https://www.instagram.com/cityseekkaunas/?hl=en" target="_blank" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="mailto:cityseekinfo@gmail.com" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
        </ul>

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
      }
  }
}
