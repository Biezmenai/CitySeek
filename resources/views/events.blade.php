@extends('layouts.new')

@section('title', 'Artimiausi renginiai')

@section('content')
    <div class="w3-panel w3-card-2 w3-theme-d2">
        <h3>Renginiai</h3>
    </div>
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Artimiausi Renginiai</h4>
        <hr class="w3-clear">
        @foreach ($events as $key=>$event)
            <div class="w3-row">
                    <div class="w3-card-2 w3-margin-bottom">
                        <header class="w3-container w3-theme-l5">
                            <h6>{{$event->title}}<span class="w3-right"><i class="fa fa-square-o" aria-hidden="true"></i></span></h6>
                        </header>
                        <div class="w3-container w3-left">
                            @if( $event->eventType == "one")

                                <p>Tipas:<b> Renginys asmeniui</b></p>
                            @else
                                <p>Tipas:<b> Komandinis renginys</b></p>
                                @endif
                                @if($event->eventType=="one")
                                    @if($ifRegistered[$key] == 0)
                                        <p><a href="renginiai/registracija/{{$event->id}}">Registruotis</a></p>
                                    @else
                                        <p>Jūs jau prisiregistravę</p>
                                    @endif

                                @elseif(Auth::user()->team > 0)
                                    @if($ifRegisteredTeam[$key] == 0)
                                        <p><a href="renginiai/komandos-registracija/{{Auth::user()->team}}/{{$event->id}}">Registruoti komandą</a></p>
                                    @else
                                        <p>Komanda jau priregistruota</p>
                                    @endif
                                @else
                                    <p>Neturite komandos</p>
                                @endif
                                @if($ifRegisteredTeam[$key] != 0)
                                    <p><a onclick="return confirm('Ar tikrai norite palikti komandinį renginį?')" href="renginiai/issiregistravimas/{{Auth::user()->team}}/{{$event->id}}"><font color="red">Palikti komandinį renginį</font></a></p>
                                @endif
                                @if($ifRegistered[$key] != 0)

                                    <p><a onclick="return confirm('Ar tikrai norite palikti renginį?')" href="renginiai/issiregistravimas/{{$event->id}}"><font color="red">Palikti renginį</font></a></p>
                                @endif
                        </div>
                        <div class="w3-container w3-center">
                           <p>Renginio pradžia    : <b><i>{{$event->start}}</i></b></p>
                            <p>Renginio pabaiga   : <b><i>{{$event->end}}</i></b></p>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>

@stop