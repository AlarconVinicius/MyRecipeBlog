@props(['categories'])

<div class="sidebar__item__categories">
    <div class="sidebar__item__title">
        <h6>Categorias</h6>
    </div>
    <ul>
        @foreach($categories as $category)
        <li><a href="{{ route('categories.show', $category) }}">{{ $category->nome }} <span>{{ $category->posts_count }}</span></a></li>
        {{-- <li><a href="#">Dessert <span>86</span></a></li>
        <li class="p-left"><a href="#">Smothie <span>25</span></a></li> --}}
        @endforeach
    </ul>
</div>