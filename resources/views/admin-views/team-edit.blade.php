@extends('layouts.admin')

@section('title', 'Redaguoti komandą')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h4>Redaguoti komandą</h4>
        <hr class="w3-clear">
        <form class="span12" id="postForm" action="/admin/edit-posts/edit/{{$article->id}}/submit" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
            Antraštė: <input class="w3-input" type="text" name="title" id="title" value="{{$article->title}}"><br>
            <textarea class="input-block-level" id="summernote" name="content" rows="18">{{$article->content}}</textarea>
            <button type="submit" class="btn btn-primary">Išsaugoti</button>
        </form>
        <br>
    </div>
@stop