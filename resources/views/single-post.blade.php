@extends('main_layouts.master')

@section('title', $page_section_title)
@section('content')

@section("style")
@endsection

<!-- Single Post Section Begin -->
<section class="single-post spad">
    <div class="single-post__hero set-bg" data-setbg="{{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}"></div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="single-post__title">
                    <div class="single-post__title__meta">
                        <h2>{{ $post->created_at->format('d') }}</h2>
                        <span>{{ $post->created_at->format('M') }}</span>
                    </div>
                    <div class="single-post__title__text">
                        <ul class="label">
                            <li>{{ $post->category->nome }}</li>
                        </ul>
                        <h4>{{ $post->titulo }}</h4>
                        <ul class="widget">
                            <li>por {{ $post->author->full_name }}</li>
                        </ul>
                    </div>
                </div>
                <div class="single-post__social__item">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                </div>
                <div class="single-post__top__text">
                    <p>{{ $post->resumo }}</p>
                </div>
                <div class="single-post__recipe__details">
                    <div class="single-post__recipe__details__option">
                        <ul>
                            <li>
                                <h5><i class="fa fa-user-o"></i>serve</h5>
                                <span>{{ $post->qtd_porcao }} @if($post->qtd_porcao > 1 ) Porções @else Porção @endif</span>
                            </li>
                            <li>
                                <h5><i class="fa fa-clock-o"></i>tempo de preparo</h5>
                                <span>{{ $post->tempo_preparo }} min</span>
                            </li>
                            <li>
                                <h5><i class="fa fa-clock-o"></i>dificuldade</h5>
                                <span>{{ $post->difficulty->nome }}</span>
                            </li>
                            <li><a href="#" class="primary-btn"><i class="fa fa-print"></i>Imprimir</a></li>
                        </ul>
                    </div>
                    <div class="single-post__recipe__details__indegradients">
                        {!! $post->conteudo !!}
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Single Post Section End -->
@endsection

@section("script")
@endsection