<div class="w3-panel w3-card-2 w3-theme-d2">
    <h3>Naujienos</h3>
</div>
@foreach($news as $post)
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <div class="w3-right w3-opacity">{{$post->created_at->diffForHumans()}}</div>
        <h4>{{$post->title}}</h4>
        <hr class="w3-clear">
        {!! $post->content !!}
        <hr class="w3-clear">
        <div class="w3-right-align w3-margin">
            <button onclick="myFunction('comments{{$post->id}}')" class="w3-btn w3-small w3-right-align w3-theme-l4"><i class="fa fa-comment fa-fw w3-margin-right"></i> Komentarai <span class="fb-comments-count w3-margin-left" data-href="http://cityseek.dev"></span></button>
        </div>
    <!--
        <div id="comments{{$post->id}}" class="w3-accordion-content w3-container">
            <div class="fb-comments" data-href="http://cityseek.dev/{{$post->id}}" data-width="100%" data-numposts="10"></div>
        </div>
    -->
    </div>

@endforeach

<div class="w3-container w3-center w3-margin">
    <ul class="w3-pagination">
        @if ($news->currentPage() != $news->firstItem())
            <li><a class="w3-theme w3-margin-right" href="{{ $news->previousPageUrl() }}">Atgal</a></li>
        @endif
        @if($news->hasMorePages())
            <li><a class="w3-theme" href="{{ $news->nextPageUrl() }}">Kitas puslapis</a></li>
        @endif
    </ul>
</div>