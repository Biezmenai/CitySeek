<!DOCTYPE html>


<html>
<head>
    <title>Visualize by TEMPLATED</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <div class="userinfo"><span class="avatar"><img src="{{ Auth::user()->avatar }}" alt="" /></span>
            <span class="info">
                Your name is  {{ Auth::user()->name }}<br>
                Your email is {{ Auth::user()->email }}<br>
                Jusu taskai: {{ Auth::user()->points }}<br>
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
        <h1>Turnyrinė lentelė</h1>
        <table>
            <tr>
                <td>Vieta</td>
                <td>Vardas</td>
                <td>Taskai</td>
            </tr>
            @foreach( $users as $key => $h)
                <tr>
                    <td>{{$key+1}}</td> <td>{{ $h->name }}</td> <td>{{ $h->points }}</td>
                </tr>
            @endforeach

        </table>

        <!-- Thumbnails -->
        <section class="thumbnails">
            <div>
                <a href="images/fulls/01.jpg">
                    <img src="images/thumbs/01.jpg" alt="" />
                    <h3>Lorem ipsum dolor sit amet</h3>
                </a>
                <a href="images/fulls/02.jpg">
                    <img src="images/thumbs/02.jpg" alt="" />
                    <h3>Lorem ipsum dolor sit amet</h3>
                </a>
            </div>
            <div>
                <a href="images/fulls/03.jpg">
                    <img src="images/thumbs/03.jpg" alt="" />
                    <h3>Lorem ipsum dolor sit amet</h3>
                </a>
                <a href="images/fulls/04.jpg">
                    <img src="images/thumbs/04.jpg" alt="" />
                    <h3>Lorem ipsum dolor sit amet</h3>
                </a>
                <a href="images/fulls/05.jpg">
                    <img src="images/thumbs/05.jpg" alt="" />
                    <h3>Lorem ipsum dolor sit amet</h3>
                </a>
            </div>
            <div>
                <a href="images/fulls/06.jpg">
                    <img src="images/thumbs/06.jpg" alt="" />
                    <h3>Lorem ipsum dolor sit amet</h3>
                </a>
                <a href="images/fulls/07.jpg">
                    <img src="images/thumbs/07.jpg" alt="" />
                    <h3>Lorem ipsum dolor sit amet</h3>
                </a>
            </div>
        </section>
        <div>
            <h4>Your name is  {{ Auth::user()->name }} </h4>
            <h4>Your email is {{ Auth::user()->email }} </h4>
            <img src="{{ Auth::user()->avatar }}" height="100" width="100" /><br>
            <a class="btn btn-info" href="auth/logout" role="button">Logout</a>
        </div>
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
