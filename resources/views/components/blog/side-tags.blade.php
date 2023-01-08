@props(['tags']) 
<div class="sidebar__item__categories">
    <div class="sidebar__item__title">
        <h6>Tags</h6>
    </div>
    <ul class="row">
        @foreach($tags as $tag)
        <li class="col-sm-4"><a href="{{ route('tags.show', $tag) }}">{{ $tag->nome }}</a></li>
        @endforeach
    </ul>
</div>