<!DOCTYPE html>
<html>
@include('includes.head')

<!-- SUMMERNOTE -->
<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<!-- include summernote css/js-->
<link href="/assets/summernote/summernote.css" rel="stylesheet">
<script src="/assets/summernote/summernote.js"></script>
<!-- END SUMMERNOTE -->

<body class="w3-theme-l4">
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:20px">
    <!-- The Grid -->
    <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m3">
            <div class="w3-card-2 w3-round w3-white">
                <button onclick="myFunction('menu')" class="w3-btn-block w3-center w3-white"><i class="fa fa-list-ul fa-fw w3-margin-right"></i>Meniu</button>

                <div id="menu" class="w3-container w3-accordion-content w3-show">
                    <h4 class="w3-center">{{ Auth::user()->name }}</h4>
                    <p class="w3-center"><img src="{{ Auth::user()->avatar }}" class="w3-circle" style="height:50px;width:50px" alt="Avatar"></p>
                    <h5 class="w3-center">Administratorius</h5>
                    <a class="w3-center" href="/">Eiti į puslapį</a>
                    <hr>

                    <h5><b>Naujienų valdymas</b></h5>
                    <ul>
                        <li><a href="/admin/new-post">Pridėti naują</a></li>
                        <li><a href="/admin/edit-posts">Redaguoti esamas</a></li>
                    </ul>
                    <hr>
                    <h5><b>Renginių valdymas</b></h5>
                    <ul>
                        <li><a href="/admin/new-event">Sukurti naują renginį</a></li>
                        <li><a href="/admin/events">Renginiai</a></li>
                    </ul>
                    <hr>
                    <h5><b>Užduočių valdymas</b></h5>
                    <ul>
                        <li><a href="/admin/tasks">Užduotys</a></li>
                    </ul>
                    <hr>
                    <h5><b>Klientų valdymas</b></h5>
                    <ul>

                    </ul>
                    <ul>
                        <li><a href="/admin/ranks">Rangų valdymas</a></li>
                    </ul>
                    <hr>
                    <h5><b>Komandų valdymas</b></h5>
                    <ul>
                        <li><a href="/admin/teams">Komandų sąrašas</a></li>
                    </ul>
                    <hr>
                </div>
            </div>
        </div>
    <!-- Middle Column -->
        <div id="mid-column" class="w3-col m9">
            <!-- Pranesimai -->
            @if (Session::has('success-message'))
                <div class="w3-panel w3-green w3-margin">
                    <h3>Pavyko!</h3>
                    <p>{{Session::get('success-message')}}</p>
                </div>
            @elseif (Session::has('error-message'))
                <div class="w3-panel w3-red w3-margin">
                    <h3>Klaida!</h3>
                    <p>{{Session::get('error-message')}}</p>
                </div>
             @endif
        @yield('content')
        <!-- End Middle Column -->
        </div>
    <!-- End Grid -->
    </div>
    <!-- End Page Container -->
</div>
<br>

</body>
</html>


<script>
    function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace("w3-show", "");
        }
    }

    (function($) {
        var $window = $(window);
            if ($window.width() < 600) {
                return $('#menu').removeClass('w3-show');
            } else {
                return $('#menu').addClass('w3-show');
            }
    })(jQuery);
</script>
