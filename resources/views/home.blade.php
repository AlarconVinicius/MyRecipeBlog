@extends('main_layouts.master')

@section('title', $page_section_title)
@section('content')

@section("style")
@endsection

<!-- Banner-->
<header class=" border-bottom" style="background-color: #fff;">
    <div class="">
        <div id="carouselExampleCaptions" class=" carousel slide mY-5" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach($latest_posts as $key => $latest_post)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} position-relative">
                    <a class="a-blog-img" href="{{ route('posts.show', $latest_post) }}"><img src="{{ asset($latest_post->image ? 'storage/' . $latest_post->image->path : 'storage/placeholders/placeholder_capa.svg' . '') }}" class="d-block blog-img-slide" alt="..." width="100%" height="auto"></a>
                    {{-- <a class="a-blog-img" href="{{ route('posts.show', $latest_post) }}"><img src="{{ asset('storage/' .$latest_post->image->path) }}" class="d-block blog-img-slide" alt="..." width="100%" height="auto"></a> --}}
                    <div class="carousel-caption d-md-block position-absolute top-50 start-50 translate-middle" width="100%" height="auto">
                        <a href="{{ route('posts.show', $latest_post) }}" class="text-decoration-none text-white">
                            <h4 class="fw-bolder mb-1">{{ $latest_post->category->nome }}</h4>
                        </a>
                        <a href="{{ route('posts.show', $latest_post) }}" class="text-decoration-none text-white">
                            <h1 class="fw-bolder mb-1">{{ $latest_post->titulo }}</h1>
                        </a>
                        <div class="info-icon position-relative">
                            <p class="mx-4"><i class="fa-solid fa-stopwatch"></i> <span>{{ $latest_post->tempo_preparo }} min</span></p>
                            <div class="separador"></div>
                            <p class="mx-4"><i class='bx bx-dish'></i> <span>{{ $latest_post->difficulty->nome }}</span></p>
                            <div class="separador"></div>
                            <p class="mx-4"><i class="fa-sharp fa-solid fa-utensils"></i> <span>{{ $latest_post->qtd_porcao }} @if($latest_post->qtd_porcao > 1 ) Porções @else Porção @endif</span></p>
                        </div>
                    </div>
                </div>
                @endforeach
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
            </div>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container mt-4">
    <h3 class="fw-bolder mb-3">{{ $main_section_title }}</h3>
    <div class="row">
        <!-- Blog Main-->
        <div class="col-lg-8">
            <div class="row">
                @forelse($posts as $post)
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4 rounded-5 " >
                        <a href="{{ route('posts.show', $post) }}"><img class="card-img-top blog-img-post" src="{{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}" alt="..." /></a>
                        {{-- <a href="{{ route('posts.show', $post) }}"><img class="card-img-top blog-img-post" src="{{ asset('storage/' .$post->image->path) }}" alt="..." /></a> --}}
                        <div class="card-body">
                            {{-- <div style="display: flex">
                                <div class="small text-muted">{{ $post->created_at->diffForHumans() . ' |' }} </div>
                                <div class="small text-muted">{{ '| ' . $post->author->first_name . ' ' . $post->author->last_name }}</div>

                            </div> --}}
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $post->category->nome }}</a>
                            <a href="{{ route('posts.show', $post) }}" class="text-decoration-none text-dark"><h2 class="card-title h4">{{ \Str::limit($post->titulo, 25) }}</h2></a>
                            <div class="info-icon position-relative">
                                <p class="mx-4 text-dark"><i class="fa-solid fa-stopwatch"></i> <span>{{ $post->tempo_preparo }} min</span></p>
                                <div class="separador border-dark"></div>
                                <p class="mx-4"><i class='bx bx-dish'></i> <span>{{ $post->difficulty->nome }}</span></p>
                                <div class="separador border-dark"></div>
                                <p class="mx-4"><i class="fa-sharp fa-solid fa-utensils"></i> <span>{{ $post->qtd_porcao }} @if($post->qtd_porcao > 1 ) Porções @else Porção @endif</span></p>
                            </div>
                        </div>
                    </div>   
                </div>
                @empty
                    <p class="lead">Nenhum post para mostrar.</p>
                @endforelse
                {{ $posts->links() }}
                
            </div>
            <!-- Pagination-->
            {{-- <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                    <li class="page-item"><a class="page-link" href="#!">15</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                </ul>
            </nav> --}}
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <x-blog.side-search />
            
            <!-- Categories widget-->
            <x-blog.side-categories :categories="$categories"/>
            
            <!-- Recent Posts-->
            <x-blog.side-latest-posts :latestPosts="$latest_posts"/>
            
            <!-- Tag widget -->
            <x-blog.side-tags :tags="$tags"/>
            
        </div>
    </div>
</div>
@endsection

@section("script")
@endsection