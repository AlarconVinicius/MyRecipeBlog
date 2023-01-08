@props(['latestPosts'])
<div class="sidebar__feature__item">
  <div class="sidebar__item__title">
      <h6>Últimos Posts</h6>
  </div>
  <div class="sidebar__feature__item__large set-bg"
      data-setbg="{{ asset($latestPosts[0]->image ? 'storage/' . $latestPosts[0]->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}">
      <div class="sidebar__feature__item__large--text">
          <span>{{ $latestPosts[0]->category->nome }}</span>
          <h5><a href="#">{{ $latestPosts[0]->titulo }}</a></h5>
      </div>
  </div>
  <div class="sidebar__feature__item__list">
      @foreach($latestPosts->slice(1)  as $post)
      <div class="sidebar__feature__item__list__single">
          <div class="post__meta">
              <h4>{{ $post->created_at->format('d') }}</h4>
              <span>{{ $post->created_at->format('M') }}</span>
          </div>
          <div class="post__text">
              <span>{{ $post->category->nome }}</span>
              <h5><a href="{{ route('posts.show', $post->slug) }}">{{ \Str::limit($post->titulo, 30) }}</a></h5>
          </div>
      </div>
      @endforeach
      
  </div>
</div>