@props(['latestPosts'])

<div class="card mb-4">
    <div class="card-header text-white" style="background-color:rgb(251, 165, 16);">Posts Recentes</div>
    <div class="card-body">
        <div class="row">
            @foreach($latestPosts as $post)
            <div class="col-sm-12">
            <div class="card mb-3" style="max-width: 350px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}" class="img-fluid mx-auto rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><a href="{{ route('posts.show', $post->slug) }}">{{ \Str::limit($post->titulo, 15) }}</a></h5>
                      <p class="card-text">{{ \Str::limit($post->resumo, 40) }}</small></p>
                    </div>
                  </div>
                </div>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</div>