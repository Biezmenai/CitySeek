@extends('layouts.new')

@section('title', 'Apie Mus')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Apie mus</h4>
        <hr class="w3-clear">
        <table class="w3-table w3-striped">
            <tr>
                <th>Vardas</th>
                <th>Grupė</th>
                <th> </th>
            </tr>
            @foreach($users as $key => $h)
                <?php if ($h->accesslevel > 0) { ?>
                <tr>
                    <td>{{ $h->name }}</td> <td>{{"IFAp-4"}}</td> <td><img src="{{ $h->avatar }}" alt=""/> </td>
                </tr>
                <?php }?>
            @endforeach

        </table>
    </div>
@stop