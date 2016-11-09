<style>
    @media screen and (max-width: 850px) {
        #userName {
            display: none;
        }
        .w3-dropdown-content {
            margin: 0 0 0 -88px;
        }
    }
    @media screen and (max-width: 750px) {
        .label {
            display: none;
        }
    }
</style>

<div class="w3-top">
    <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
        <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
            <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        </li>
        <li><a href="/" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>CitySeek</a></li>
        <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Jūsų komanda"><i class="fa fa-users"></i><span class="w3-medium w3-margin-left label">Komanda</span></a></li>
        <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Renginiai"><i class="fa fa-calendar-check-o"></i><span class="w3-medium w3-margin-left label">Renginiai</span></a></li>
        <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a></li>
        <li class="w3-hide-small w3-dropdown-hover">
            <a href="#" class="w3-padding-large w3-hover-white" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></a>
            <div class="w3-dropdown-content w3-white w3-card-4">
                <a href="#">One new friend request</a>
                <a href="#">John Doe posted on your wall</a>
                <a href="#">Jane likes your post</a>
            </div>
        </li>
        @if (Auth::user())
           <li class="w3-hide-small w3-right w3-dropdown-hover">
               <a class="w3-padding-large w3-hover-white" title="Mano paskyra"><img src="{{ Auth::user()->avatar }}" class="w3-circle" style="height:25px;width:25px" alt="Avatar"><span id="userName" class="w3-medium w3-margin-left">{{ Auth::user()->name }}</span></a>
               <div class="w3-dropdown-content w3-white w3-card-4">
                   @if (Auth::user()->accesslevel > 0)
                       <a href="/admin"><i class="fa fa-cogs w3-margin-right"></i><span class="w3-medium">Admin</span></a>
                   @endif
                   <a href="#"><i class="fa fa-user w3-margin-right"></i><span class="w3-medium">Mano paskyra</span></a>
                   <a onclick="document.getElementById('color-modal').style.display='block'" href="#"><i class="fa fa-paint-brush w3-margin-right"></i><span class="w3-medium">Keisti spalvą</span></a>
                   <a href="/logout"><i class="fa fa-sign-out w3-margin-right"></i><span class="w3-medium">Atsijungti</span></a>
               </div>
           </li>
        @else
            <li class="w3-hide-small w3-right"><a href="/auth/facebook" class="w3-padding-large w3-hover-white"><i class="fa fa-sign-in w3-margin-right"></i><span class="w3-medium">Prisijunkite</span></a></li>
        @endif
    </ul>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
    <ul class="w3-navbar w3-left-align w3-large w3-theme">
        <li>
            @if (Auth::user() && Auth::user()->accesslevel > 0)
                <a href="/admin"><i class="fa fa-cogs w3-margin-right"></i><span class="w3-medium">Admin</span></a>
            @endif
        </li>
        <li><a onclick="document.getElementById('color-modal').style.display='block'" href="#"><i class="fa fa-paint-brush w3-margin-right"></i><span class="w3-medium">Keisti spalvą</span></a></li>
        @if (Auth::user())
            <li><a href="#"><i class="fa fa-user w3-margin-right"></i><span class="w3-medium">Mano paskyra</span></a></li>
            <li><a href="/logout"><i class="fa fa-sign-out w3-margin-right"></i><span class="w3-medium">Atsijungti</span></a></li>
        @else
            <li><a href="/auth/facebook"><i class="fa fa-sign-in w3-margin-right"></i><span class="w3-medium">Prisijunkite</span></a></li>
        @endif
    </ul>
</div>

<!-- Modal -->
<div id="color-modal" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-8">
        <header class="w3-container w3-theme">
        <span onclick="document.getElementById('color-modal').style.display='none'"
              class="w3-closebtn">&times;</span>
            <h2>Keisti tinklapio spalvą</h2>
        </header>
        <div class="w3-container">
            <div class="w3-row-padding w3-margin">
                <a href="/color/green"><div class="w3-card-2 w3-col m4 w3-green w3-center"><p>Žalia</p></div></a>
                <a href="/color/pink"><div class="w3-card-2 w3-col m4 w3-pink w3-center"><p>Rožinė</p></div></a>
                <a href="/color/red"><div class="w3-card-2 w3-col m4 w3-red w3-center"><p>Raudona</p></div></a>
                <a href="/color/cyan"><div class="w3-card-2 w3-col m4 w3-cyan w3-center"><p>Žydra</p></div></a>
                <a href="/color/blue"><div class="w3-card-2 w3-col m4 w3-blue w3-center"><p>Mėlyna</p></div></a>
                <a href="/color/indigo"><div class="w3-card-2 w3-col m4 w3-indigo w3-center"><p>Indigo</p></div></a>
                <a href="/color/deep-purple"><div class="w3-card-2 w3-col m4 w3-deep-purple w3-center"><p>Violetinė</p></div></a>
                <a href="/color/blue-grey"><div class="w3-card-2 w3-col m4 w3-blue-grey w3-center"><p>Mėlynai pilka</p></div></a>
                <a href="/color/black"><div class="w3-card-2 w3-col m4 w3-black w3-center"><p>Juoda</p></div></a>
            </div>
        </div>
    </div>
</div>