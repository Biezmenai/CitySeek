<!DOCTYPE html>


<html>
<head>
    <title>CitySeek tasks</title>
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
        <div class="userinfo"><span class="avatar"><img src="{{ Auth::user()->avatar }}" alt="" /></span>
            <span class="info">
                Prisijungėte kaip:  <strong>{{ Auth::user()->name }}</strong><br>
                Jusu taškai: <strong>{{ Auth::user()->points }}</strong><br>
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
        <h1>Užduotys</h1>

        <table>
            <tr>
                <td>Rūšis</td>
                <td>Pavadinimas</td>
                <td>Aprašymas</td>
                <td>Taškai</td>
                <td>Liko laiko</td>
                <td></td>
            </tr>

            @foreach( $tasks as $id)
                <?php $aprasymas = $id->aprasymas; ?>
                <tr>
                    <td>{{$id->rusis}}</td> <td>{{$id->pavadinimas}}</td> <td><div class="item"><?php echo $aprasymas;?></div></td> <td>{{$id->taskai}}</td><td></td>
                    <td>
                        <div class="vykdyti">
                        <form action="{{ URL::to('ideti') }}" method="post" enctype="multipart/form-data">

                            <input type="file" name="file" id="file">
                            <input type="submit" value="Upload" name="submit">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            <input type="hidden" value="uploads/{{Auth::user()->facebook_id}}" name="foldername" id="foldername">
                            <input type="hidden" value="{{Auth::user()->facebook_id}}" name="owner" id="owner">
                            <input type="hidden" value="/uploads/{{Auth::user()->facebook_id}}" name="link" id="link">
                            <input type="hidden" value="{{$id->id}}" name="task_id" id="task_id">
                            <input type="hidden" value="{{$id->taskai}}" name="taskaiuzduoti" id="taskaiuzduoti">
                        </form></div>
                    </td>
                </tr>
            @endforeach

        </table>

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
<script>

    $(function(){ /* to make sure the script runs after page load */

        $('.item').each(function(event){ /* select all divs with the item class */

            var max_length = 50; /* set the max content length before a read more link will be added */

            if($(this).html().length > max_length){ /* check for content length */

                var short_content 	= $(this).html().substr(0,max_length); /* split the content in two parts */
                var long_content	= $(this).html().substr(max_length);

                $(this).html(short_content+
                        '<a href="#" class="read_more"><br/>Rodyti visą</a>'+
                        '<span class="more_text" style="display:none;">'+long_content+'</span>'); /* Alter the html to allow the read more functionality */

                $(this).find('a.read_more').click(function(event){ /* find the a.read_more element within the new html and bind the following code to it */

                    event.preventDefault(); /* prevent the a from changing the url */
                    $(this).hide(); /* hide the read more button */
                    $(this).parents('.item').find('.more_text').show(); /* show the .more_text span */

                });

            }

        });


    });

</script>

<script>

    $(function(){ /* to make sure the script runs after page load */

        $('.vykdyti').each(function(event){ /* select all divs with the item class */

            var max_length = 0; /* set the max content length before a read more link will be added */

            if($(this).html().length > max_length){ /* check for content length */

                var short_content 	= $(this).html().substr(0,max_length); /* split the content in two parts */
                var long_content	= $(this).html().substr(max_length);

                $(this).html(short_content+
                        '<a href="#" class="read_more"><br/>Vykdyti</a>'+
                        '<span class="more_text" style="display:none;">'+long_content+'</span>'); /* Alter the html to allow the read more functionality */

                $(this).find('a.read_more').click(function(event){ /* find the a.read_more element within the new html and bind the following code to it */

                    event.preventDefault(); /* prevent the a from changing the url */
                    $(this).hide(); /* hide the read more button */
                    $(this).parents('.vykdyti').find('.more_text').show(); /* show the .more_text span */

                });

            }

        });


    });

</script>


</body>
</html>