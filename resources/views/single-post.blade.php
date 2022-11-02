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
                        <p class="mx-4 text-dark"><i class="fa-solid fa-stopwatch"></i> <span>30min</span></p>
                        <div class="separador border-dark"></div>
                        <p class="mx-4"><i class='bx bx-dish'></i> <span>Fácil</span></p>
                        <div class="separador border-dark"></div>
                        <p class="mx-4"><i class="fa-sharp fa-solid fa-utensils"></i> <span>5 Porções</span></p>
                    </div>
                    
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded blog-img-single-post" src="{{ asset('storage/' .$post->image->path) }}" alt="..."/></figure>
                {{-- <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." width="900px" height="400px"/></figure>{{ asset('storage/' .$post->image->path) }} --}}
                <!-- Post content-->
                <section class="mb-5">
                    <h2 class="fw-bolder mb-4 mt-5">Ingredientes</h2>
                    <p class="fs-5 mb-4">● {{ $post->ingrediente }}</p>
                    <p class="fs-5 mb-4">1/2 xícara de pimentões em cubos</p>
                    <p class="fs-5 mb-4">1 xícara de berinjela em cubos</p>
                    <p class="fs-5 mb-4">1/2 xícara de tomate cereja</p>
                    <p class="fs-5 mb-4">1 colher de sopa de azeite</p>
                    <h2 class="fw-bolder mb-4 mt-5">Modo de Preparo</h2>
                    <p class="fs-5 mb-4">● {{ $post->modo_preparo }}</p>
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
            <div class="card mb-4">
                <div class="card-header text-white" style="background-color:rgb(251, 165, 16);">Pesquisar</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Encontre uma receita..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn text-white" style="background-color: rgb(255, 106, 40);" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header text-white" style="background-color:rgb(251, 165, 16);">Categorias</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header text-white" style="background-color:rgb(251, 165, 16);">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div>
            <!-- Tag widget -->
            <div class="card mb-4">
                <div class="card-header text-white" style="background-color:rgb(251, 165, 16);">Tags</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection

@section("script")
@endsection