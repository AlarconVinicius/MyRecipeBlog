@props(['categories'])

<div class="card mb-4">
    <div class="card-header text-white" style="background-color:rgb(251, 165, 16);">Categorias</div>
    <div class="card-body">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    <li><a href="{{ route('categories.show', $category) }}">{{ $category->nome }} <span>{{ $category->posts_count }}</span></a></li>
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>