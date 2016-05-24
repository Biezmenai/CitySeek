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
        <a class="btn btn-info" href="auth/facebook" role="button">Login with Facebook</a>

        <form action="upload" id="upload" enctype="multipart/form-data">
            <input type="file" name="file[]" multiple><br />
            <input type="submit">
        </form>
        <script>
            var form = document.getElementById('upload');
            var request = new XMLHtttpRequest();

            form.addEventListener('submit', function(e){
                e.preventDefault();
                var formdata = new FormData(form);

                request.open('post', '/upload');
                request.addEventListener("load", transferComplete);
                request.send(formdata);
            });

            function transferComplete(){
                console.log(data.currentTarget.response);
            }
        </script>

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
