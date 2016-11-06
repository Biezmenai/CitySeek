@extends('layouts.admin')

@section('title', 'Naujas blogo įrašas')

@section('content')
<div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
    <h4>Naujas naujienų įrašas</h4>
    <hr class="w3-clear">
    <form class="span12" id="postForm" action="{{ URL::to('add') }}" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
        Antraštė: <input class="w3-input" type="text" name="title" id="title"><br>
        <textarea class="input-block-level" id="summernote" name="content" rows="18"></textarea>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary">Įkelti</button>
    </form>
    <br>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null             // set maximum height of editor
        });
    });

    var postForm = function() {
        var content = $('textarea[name="content"]').html($('#summernote').code());
    }
</script>
@stop