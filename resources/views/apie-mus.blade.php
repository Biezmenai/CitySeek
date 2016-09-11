<!DOCTYPE html>
<html>
@include('includes.head')
<body>
    <div id="wrapper">
        @include('includes.header')
        <!-- Main -->
        <section id="main">

            <table>
                <tr>

                    <td>Vardas</td>
                    <td>Grupė</td>
                    <td> </td>
                </tr>
                @foreach( $users as $key => $h)
		    <?php if ($h->accesslevel > 0) { ?>
                    <tr>
                        <td>{{ $h->name }}</td> <td>{{"IF-4/9"}}</td> <td><img src="{{ $h->avatar }}" alt=""/> </td>
                    </tr>
		    <?php }?>
                @endforeach

            </table>

            <br>
            @include('includes.navigation')
        </section>
        <!-- Footer -->
        @include('includes.footer')

    </div>
    @include('includes.footer')

</body>
</html>
