<html>
<head>
    <title>Visualize by TEMPLATED</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
<form action="{{ URL::to('ideti') }}" method="post" enctype="multipart/form-data">
    <label>Select image to upload </label>
    <input type="file" name="file" id="file">
    <input type="submit" value="Upload" name="submit">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
</form>


<header id="header">
    <a class="btn btn-info" href="auth/facebook" role="button">Login with Facebook</a>



<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->


        <ul class="icons">
            <li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
        </ul>
    </header>


    <!-- Main -->
    <section id="main">

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

