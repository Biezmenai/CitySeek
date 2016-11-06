<!-- Left Column -->
<div class="w3-col m3">
    <!-- Profile -->
    <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
            <h4 class="w3-center">{{ Auth::user()->name }}</h4>
            <p class="w3-center"><img src="{{ Auth::user()->avatar }}" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
            <!-- Trigger/Open the Modal -->
            <button onclick="document.getElementById('id01').style.display='block'"
                    class="w3-btn">Open Modal</button>
            <hr>
            <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> {{ Auth::user()->points }}</p>
            <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
            <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
        </div>
    </div>
    <br>
@if (Auth::user()->team == 0)
    @include('includes.create-team-modal')
    @include('includes.join-team-modal')
@endif
    <!-- Accordion -->
    <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white">
            <!-- Mano komanda -->
            <button onclick="myFunction('my_team')" class="w3-btn-block w3-theme w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Mano komanda</button>
            <div id="my_team" class="w3-accordion-content w3-container w3-center">
                @if (Auth::user()->team == 0)
                    <p>Jūs neturite komandos!</p>
                    <p>Norint dalyvauti komandinėse rungtyse, reikia turėti komandą:</p>
                    <p><button onclick="document.getElementById('create-team').style.display='block'" class="w3-btn w3-hover-white">Kurti naują komandą</button></p>
                    <p><button onclick="document.getElementById('join-team').style.display='block'" class="w3-btn w3-hover-white">Prisijungti prie komandos</button></p>
                @else
                    <p><b>{{$team->name}}</b></p>
                    <p><img src="{{$team->image}}"></p>
                    <p>Dalyvauta varžybų: <b>0</b></p>
                    <hr>
                    <p><a href="/komanda/{{$team->id}}">Eiti į komandos puslapį</a></p>
                @endif
            </div>

            <button onclick="myFunction('Demo2')" class="w3-btn-block w3-theme w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Mano renginiai</button>
            <div id="Demo2" class="w3-accordion-content w3-container">
                <p>Some other text..</p>
            </div>
            <button onclick="myFunction('Demo3')" class="w3-btn-block w3-theme w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
            <div id="Demo3" class="w3-accordion-content w3-container">
                <div class="w3-row-padding">
                    <br>
                    <div class="w3-half">
                        <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
                    </div>
                    <div class="w3-half">
                        <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
                    </div>
                    <div class="w3-half">
                        <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
                    </div>
                    <div class="w3-half">
                        <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
                    </div>
                    <div class="w3-half">
                        <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
                    </div>
                    <div class="w3-half">
                        <img src="/w3images/fjords.jpg" style="width:100%" class="w3-margin-bottom">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- Interests -->
    <div class="w3-card-2 w3-round w3-white w3-hide-small">
        <div class="w3-container">
            <p>Interests</p>
            <p>
                <span class="w3-tag w3-small w3-theme-d5">News</span>
                <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
                <span class="w3-tag w3-small w3-theme-d3">Labels</span>
                <span class="w3-tag w3-small w3-theme-d2">Games</span>
                <span class="w3-tag w3-small w3-theme-d1">Friends</span>
                <span class="w3-tag w3-small w3-theme">Games</span>
                <span class="w3-tag w3-small w3-theme-l1">Friends</span>
                <span class="w3-tag w3-small w3-theme-l2">Food</span>
                <span class="w3-tag w3-small w3-theme-l3">Design</span>
                <span class="w3-tag w3-small w3-theme-l4">Art</span>
                <span class="w3-tag w3-small w3-theme-l5">Photos</span>
            </p>
        </div>
    </div>
    <br>

    <!-- Alert Box -->
    <div class="w3-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-hover-text-grey w3-closebtn">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
    </div>

    <!-- End Left Column -->
</div>