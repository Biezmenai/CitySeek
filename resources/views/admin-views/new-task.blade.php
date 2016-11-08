@extends('layouts.admin')

@section('title', 'Pridėti užduotį')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Pridėti užduotį</h4>
        <hr class="w3-clear">
        <form class="span12" id="postForm" action="/admin/tasks/event/{{$event_id}}/add-task/submit" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
            <b>Pavadinimas:</b> <input class="w3-input" type="text" name="pavadinimas" id="pavadinimas"><br>
            <b>Tipas:</b> <select class="w3-select w3-margin-bottom" name="rusis">
                <option value="photo">Nuotrauka</option>
                <option value="text">Tekstinis</option>
            </select><br>
            <b>Taškai:</b><br><input class="w3-margin-bottom" type="number" name="taskai" min="0"><br>
            <b>Aprašymas:</b> <textarea class="input-block-level" id="summernote" name="aprasymas" rows="18"></textarea>
            <button type="submit" class="btn btn-primary">Pridėti</button>
        </form>
        <br>
    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null             // set maximum height of editor
            });
        });

        var postForm = function() {
            var content = $('textarea[name="content"]').html($('#summernote').code());
        }
    </script>
@stop