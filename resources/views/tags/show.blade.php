@extends('main_layouts.master')

@section('title', $page_section_title)
@section('content')

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
                        <a href="{{ route('posts.show', $post) }}"><img class="card-img-top blog-img-post" src="{{ asset('storage/' .$post->image->path) }}" alt="..." /></a>
                        <div class="card-body">
                            {{-- <div style="display: flex">
                                <div class="small text-muted">{{ $post->created_at->diffForHumans() . ' |' }} </div>
                                <div class="small text-muted">{{ '| ' . $post->author->first_name . ' ' . $post->author->last_name }}</div>

                            </div> --}}
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $post->category->nome }}</a>
                            <a href="{{ route('posts.show', $post) }}" class="text-decoration-none text-dark"><h2 class="card-title h4">{{ \Str::limit($post->titulo, 25) }}</h2></a>
                            <div class="info-icon position-relative">
                                <p class="mx-4 text-dark"><i class="fa-solid fa-stopwatch"></i> <span>30min</span></p>
                                <div class="separador border-dark"></div>
                                <p class="mx-4"><i class='bx bx-dish'></i> <span>Fácil</span></p>
                                <div class="separador border-dark"></div>
                                <p class="mx-4"><i class="fa-sharp fa-solid fa-utensils"></i> <span>5 Porções</span></p>
                            </div>
                        </div>
                    </div>   
                </div>
                @empty
                    <p class="lead">Essa tag não possui nenhum post.</p>
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
            
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header text-white" style="background-color:rgb(251, 165, 16);">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div>
            <!-- Tag widget -->
            <x-blog.side-tags :tags="$tags"/>
            
        </div>
    </div>
</div>
@endsection