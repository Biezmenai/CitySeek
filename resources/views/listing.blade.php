<!DOCTYPE html>
<html>
@include('includes.head')
<body>
<!-- Wrapper -->
<div id="wrapper">
    <!-- Header -->
    @include('includes.header')
    <!-- Main -->
    <section id="main">
        <h1>Turnyrinė lentelė</h1>
        <table>
            <tr>
                <td>Vieta</td>
                <td>Vardas</td>
                <td>Taškai</td>
            </tr>
            @foreach( $users as $key => $h)
                <tr>
                    <td>{{$key+1}}</td> <td>{{ $h->name }}</td> <td>{{ $h->points }}</td>
                </tr>
            @endforeach
        </table>

        <br>
        @include('includes.navigation')
    </section>
    @include('includes.footer')
</div>
@include('includes.scripts')
</body>
</html>
