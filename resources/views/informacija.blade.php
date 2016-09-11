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

            <table>
                <tr>
                    <td>ID</td>
                    <td>Pavadinimas</td>
                    <td>Aprasymas</td>
                    <td>Pradzios laikas</td>
                    <td>Pabaigos laikas</td>
                    <td>Likes laikas</td>
                </tr>
                @foreach( $renginys as $id)
                    <tr>
                        <td>{{$id->id}}</td> <td>{{$id->name}}</td> <td>{{$id->aprasymas}}</td>
                        <td>{{$id->pradzios_data}}</td> <td>{{$id->pabaigos_data}}</td> <td>{{$id->likes_laikas}}</td>
                    </tr>
                @endforeach

            </table>

            <br>
            @include('includes.navigation')
        </section>

        <!-- Footer -->
        @include('includes.footer')

    </div>
    @include('includes.scripts')

</body>
</html>