<!DOCTYPE html>
<html>
@include('includes.head')
<body>
<!-- Wrapper -->
<div id="wrapper">
    @include('includes.header')

    <!-- Main -->
    <section id="main">
        <h1>Užduotys</h1>

        <table>
            <tr>
                <td>Rūšis</td>
                <td>Pavadinimas</td>
                <td>Aprašymas</td>
                <td>Taškai</td>
                <td></td>
            </tr>

            @foreach( $tasks as $id)
                <?php $aprasymas = $id->aprasymas; ?>
                <tr>
                    <td>{{$id->rusis}}</td> <td>{{$id->pavadinimas}}</td> <td><div class="item"><?php echo $aprasymas;?></div></td> <td>{{$id->taskai}}</td>
                    <td>
                        <div class="vykdyti">
                        <form action="{{ URL::to('ideti') }}" method="post" enctype="multipart/form-data">

                            <input type="file" name="file" id="file">
                            <input type="submit" value="Upload" name="submit">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            <input type="hidden" value="uploads/{{Auth::user()->facebook_id}}" name="foldername" id="foldername">
                            <input type="hidden" value="{{Auth::user()->facebook_id}}" name="owner" id="owner">
                            <input type="hidden" value="/uploads/{{Auth::user()->facebook_id}}" name="link" id="link">
                            <input type="hidden" value="{{$id->id}}" name="task_id" id="task_id">
                            <input type="hidden" value="{{$id->taskai}}" name="taskaiuzduoti" id="taskaiuzduoti">
                        </form></div>
                    </td>
                </tr>
            @endforeach

        </table>
        @include('includes.navigation')
    </section>
    @include('includes.footer')
</div>
@include('includes.scripts')
<script>

    $(function(){ /* to make sure the script runs after page load */

        $('.item').each(function(event){ /* select all divs with the item class */

            var max_length = 50; /* set the max content length before a read more link will be added */

            if($(this).html().length > max_length){ /* check for content length */

                var short_content 	= $(this).html().substr(0,max_length); /* split the content in two parts */
                var long_content	= $(this).html().substr(max_length);

                $(this).html(short_content+
                        '<a href="#" class="read_more"><br/>Rodyti visą</a>'+
                        '<span class="more_text" style="display:none;">'+long_content+'</span>'); /* Alter the html to allow the read more functionality */

                $(this).find('a.read_more').click(function(event){ /* find the a.read_more element within the new html and bind the following code to it */

                    event.preventDefault(); /* prevent the a from changing the url */
                    $(this).hide(); /* hide the read more button */
                    $(this).parents('.item').find('.more_text').show(); /* show the .more_text span */

                });

            }

        });


    });

</script>

<script>

    $(function(){ /* to make sure the script runs after page load */

        $('.vykdyti').each(function(event){ /* select all divs with the item class */

            var max_length = 0; /* set the max content length before a read more link will be added */

            if($(this).html().length > max_length){ /* check for content length */

                var short_content 	= $(this).html().substr(0,max_length); /* split the content in two parts */
                var long_content	= $(this).html().substr(max_length);

                $(this).html(short_content+
                        '<a href="#" class="read_more"><br/>Vykdyti</a>'+
                        '<span class="more_text" style="display:none;">'+long_content+'</span>'); /* Alter the html to allow the read more functionality */

                $(this).find('a.read_more').click(function(event){ /* find the a.read_more element within the new html and bind the following code to it */

                    event.preventDefault(); /* prevent the a from changing the url */
                    $(this).hide(); /* hide the read more button */
                    $(this).parents('.vykdyti').find('.more_text').show(); /* show the .more_text span */

                });

            }

        });


    });

</script>


</body>
</html>