@extends('main_layouts.master')

@section('title', $page_section_title)
@section('content')

@section("style")
@endsection

<!-- Categories Section Begin -->
<section class="categories categories-grid spad">
    <div class="categories__post">
        <div class="container">
            <div class="categories__grid__post">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="breadcrumb__text">
                            <h2>Tag: <span>{{ $main_section_title }}</span></h2>
                            <div class="breadcrumb__option">
                                <a href="{{ route('home') }}">Início</a>
                                <span>{{ $main_section_title }}</span>
                            </div>
                        </div>
                        @forelse($posts as $post)
                        <div class="categories__list__post__item">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="categories__post__item__pic set-bg"
                                        data-setbg="{{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}">
                                        <div class="post__meta">
                                            <h4>{{ $post->created_at->format('d') }}</h4>
                                            <span>{{ $post->created_at->format('M') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="categories__post__item__text">
                                        <ul class="post__label--large">
                                            <li>{{ $post->category->nome }}</li>
                                        </ul>
                                        <h3><a href="{{ route('posts.show', $post->slug) }}">{{ $post->titulo }}</a>
                                        </h3>
                                        <ul class="post__widget">
                                            <li>por <span>{{ $post->author->full_name }}</span></li>
                                            <li>{{ $post->difficulty->nome }}</li>
                                            <li>{{ $post->qtd_porcao }} @if($post->qtd_porcao > 1 ) Porções @else Porção @endif</li>
                                        </ul>
                                        <p>{{ $post->resumo }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @empty
                            <p class="lead">Essa categoria não possui nenhum post.</p>
                        @endforelse
                        {{ $posts->links() }}
                        
                        {{-- <div class="row">
                            <div class="col-lg-12">
                                <div class="categories__pagination">
                                    <a href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">Next</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Side widgets-->
                <div class="col-lg-4 col-md-4">
                            
                    <!-- About Me-->
                    <x-blog.side-about-me/>

                    <!-- Follow Us-->
                    <x-blog.side-follow/>

                    <!-- Recent Posts-->
                    <x-blog.side-latest-posts :latestPosts="$latest_posts"/>

                    <!-- Google Ads-->
                    <x-blog.side-ads/>
                    
                    <!-- Categories widget-->
                    <x-blog.side-categories :categories="$categories"/>

                    <!-- Tag widget -->
                    <x-blog.side-tags :tags="$tags"/>

                    <!-- Subscribe widget -->
                    <x-blog.side-subscribe />

                    <!-- Search widget-->
                    <x-blog.navbar-search />
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->
@endsection

@section("script")
@endsection