<?php
use App\User;
?>
<!-- Header -->
    <header id="header">
        <h1 align="center">CitySeek Kaunas</h1>
        <?php if (Auth::user()) { ?>
        <div class="userinfo"><span class="avatar"><img src="{{ Auth::user()->avatar }}" alt="" /></span>
            <span class="info">
                Prisijungėte kaip:  <strong>{{ Auth::user()->name }}</strong><br>
                Jusu taškai: <strong>{{ Auth::user()->points }}</strong><br>
                <?php
                $me = Auth::user();
                $rank = User::where('points', '>', $me->points)->count() + 1;
                ?>
                Užimama vieta: <strong><font color="green">#{{ $rank }}</font></strong><br>
            </span>
        </div>
        <?php } ?>
        <ul class="icons">
            <li><a href="https://twitter.com/CitySeekKaunas" target="_blank" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="https://www.facebook.com/cityseekkaunas/" target="_blank" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="https://www.instagram.com/cityseekkaunas/?hl=en" target="_blank" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="mailto:cityseekinfo@gmail.com" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
        </ul>
    </header>