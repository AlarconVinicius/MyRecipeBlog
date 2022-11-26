@extends('main_layouts.master')

@section('title', 'Post')
@section('content')

@section("style")
@endsection

<!-- Page content-->
<div class="container">
    <div class="row mt-5">
        <!-- Blog Main-->
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $post->category->nome }}</a>

                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{ $post->titulo }}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-3">{{ $post->created_at->diffForHumans() }} por {{ $post->author->full_name }}</div>
                    <p class="fs-10 mb-4">{{ $post->resumo }}</p>
                    <div class="info-icon position-relative">
                        <p class="mx-4 text-dark"><i class="fa-solid fa-stopwatch"></i> <span>{{ $post->tempo_preparo }} min</span></p>
                        <div class="separador border-dark"></div>
                        <p class="mx-4"><i class='bx bx-dish'></i> <span>{{ $post->difficulty->nome }}</span></p>
                        <div class="separador border-dark"></div>
                        <p class="mx-4"><i class="fa-sharp fa-solid fa-utensils"></i> <span>{{ $post->qtd_porcao }} @if($post->qtd_porcao > 1 ) Porções @else Porção @endif</span></p>
                    </div>
                    
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded blog-img-single-post" src="{{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}" alt="..."/></figure>
                {{-- <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." width="900px" height="400px"/></figure>{{ asset('storage/' .$post->image->path) }} --}}
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">{!! $post->conteudo !!}</p>
                    {{-- <p class="fs-5 mb-4">1/2 xícara de pimentões em cubos</p>
                    <p class="fs-5 mb-4">1 xícara de berinjela em cubos</p>
                    <p class="fs-5 mb-4">1/2 xícara de tomate cereja</p>
                    <p class="fs-5 mb-4">1 colher de sopa de azeite</p> --}}
                </section>
            </article>
            <section class="mb-5">
                <div class="d-flex">
                    <h2 class="fw-bolder mb-4 mt-5">Receitas relacionadas</h2>
                    <a class="btn rounded-pill btn-outline-warning" href="#" role="button">Ver todas as receitas</a>
                </div>
            </section>
            <!-- Comments section-->
            {{-- <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                        <!-- Comment with nested comments-->
                        <div class="d-flex mb-4">
                            <!-- Parent comment-->
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">Commenter Name</div>
                                If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                <!-- Child comment 1-->
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                    </div>
                                </div>
                                <!-- Child comment 2-->
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When you put money directly to a problem, it makes a good headline.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single comment-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">Commenter Name</div>
                                When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
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

@section("script")
@endsection