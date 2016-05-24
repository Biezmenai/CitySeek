<!DOCTYPE html>


<html>
<head>
    <title>Visualize by TEMPLATED</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>

<a class="btn btn-info" href="padidinti" role="button">zS</a>


<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <div class="userinfo"><span class="avatar"><img src="{{ Auth::user()->avatar }}" alt="" /></span>
            <span class="info">
                Prisijungėte kaip:  <strong>{{ Auth::user()->name }}</strong><br>
                Jusu taškai: <strong>{{ Auth::user()->points }}</strong><br>
                 Užimama vieta: <strong><font color="green">#{{ $rank }}</font></strong><br>
            </span>
        </div>
        <ul class="icons">
            <li><a href="https://twitter.com/CitySeekKaunas" target="_blank" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="https://www.facebook.com/cityseekkaunas/" target="_blank" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="https://www.instagram.com/cityseekkaunas/?hl=en" target="_blank" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="mailto:cityseekinfo@gmail.com" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
        </ul>

    </header>

    <!-- Main -->
    <section id="main">

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
                <a href="/apie-mus">
                    <img src="images/thumbs/about_us.png" alt="" />
                    <h3>Apie mus</h3>
                </a>
            </div>
            <div>
                <a href="/listing">
                    <img src="images/thumbs/listing.png" alt="" />
                    <h3>Turnyrinė lentelė</h3>
                </a>
            </div>
        </section>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <p>&copy; Untitled. All rights reserved. Design: <a href="http://templated.co">TEMPLATED</a>. Demo Images: <a href="http://unsplash.com">Unsplash</a>.</p>
    </footer>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.poptrox.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
