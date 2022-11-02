@props(['tags'])
<div class="card mb-4">
    <div class="card-header text-white" style="background-color:rgb(251, 165, 16);">Tags</div>
    <div class="card-body">
        <div class="row">
            @foreach($tags as $tag)
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    <li><a href="{{ route('tags.show', $tag) }}">{{ $tag->nome }}</a></li>
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>  