@extends('layouts.admin')

@section('title', 'Redaguoti užduotį')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Redaguoti užduotį</h4>
        <hr class="w3-clear">
        <form class="span12" id="postForm" action="/admin/tasks/edit-task/{{$task->id}}/submit" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
            <b>Pavadinimas:</b> <input class="w3-input" type="text" name="pavadinimas" id="pavadinimas" value="{{$task->pavadinimas}}"><br>
            <b>Tipas:</b> <select class="w3-select w3-margin-bottom" name="rusis">
                <option value="photo" <?=$task->rusis == 'photo' ? ' selected="selected"' : '';?>>Nuotrauka</option>
                <option value="text" <?=$task->rusis == 'text' ? ' selected="selected"' : '';?>>Tekstinis</option>
            </select><br>
            <b>Taškai:</b><br><input class="w3-margin-bottom" type="number" name="taskai" min="0" value="{{$task->taskai}}"><br>
            <b>Aprašymas:</b> <textarea class="input-block-level" id="summernote" name="aprasymas" rows="18">{{$task->aprasymas}}</textarea>
            <button type="submit" class="btn btn-primary">Išsaugoti</button>
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