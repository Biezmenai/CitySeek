
@extends('layouts.new')

@section('title', 'Komanda')

@section('content')

    <div class="w3-panel w3-card-2 w3-theme-d2">
        <h3>Komandos puslapis</h3>
    </div>
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
            <h4>{{$team->name}}</h4>

            <h4>
                <img src="{{$team->image}} ">
            </h4>
            <a> Komanda sukurta {{$team->created_at}}</a>
            <hr class="w3-clear">



            <table>
                <tr>
                    <th>
                        Komandos kapitonas
                    </th>
                </tr>
                <tr>
                    @foreach($team->members as $member)

                            <?php if    ($member->id == $team->captain) { ?>

                               <td>{{ $member->name }}</td>
                            <?php }?>
                    @endforeach
                 </tr>
                </table>
            <table>
                <tr>
                   <th> Komandos nariai </th>
                </tr>
            </table>
                        <?php if  ($team->members_count == 1) { ?>
                        <a>Jūs esate vienintelis žmogus šioje komandoje</a>
                        <?php } else  {?>
                <ul style="list-style-type:none">
                            @foreach($team->members as $member)
                                <?php if    ($member->id != $team->captain) { ?>
                                  <li>{{$member->name}}
                                     @if (Auth::user()->id == $team->captain)
                                      <a href="/komanda/{{$team->id}}/deletemember/{{$member->id}}"><i title="ištrinti" class="fa fa-times-circle" aria-hidden="true"></i></a>
                                      <a href="/komanda/{{$team->id}}/changecaptain/{{$member->id}}"><i title="Pakeisti kapitoną" class="fa fa-star" aria-hidden="true"></i></a>
                                      @endif
                                    </li>
                                <?php }?>
                            @endforeach
                            <?php } ?>

                </ul>
            @if (Auth::user()->id == $team->captain)
                <label> Komandos slaptas kodas yra: </label>
                <b>{{$team->secret}}</b>

                <a href="/komanda/{{$team->id}}/change-secret"><button>Keisti</button></a>


            @endif
        </div>

@stop