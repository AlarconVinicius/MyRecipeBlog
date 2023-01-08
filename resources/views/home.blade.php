@extends('main_layouts.master')

@section('title', $page_section_title)
@section('content')

@section("style")
@endsection

<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__item">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 p-0">
                        <div class="hero__inside__item hero__inside__item--wide set-bg"
                            data-setbg="{{ asset($latest_posts[0]->image ? 'storage/' . $latest_posts[0]->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}">
                            <div class="hero__inside__item__text">
                                <div class="hero__inside__item--meta">
                                    <span>{{ $latest_posts[0]->created_at->format('d') }}</span>
                                    <p>{{ $latest_posts[0]->created_at->format('M') }}</p>
                                </div>
                                <div class="hero__inside__item--text">
                                    <ul class="label">
                                        <li>{{ $latest_posts[0]->category->nome }}</li>
                                    </ul>
                                    <h4><a href="{{ route('posts.show', $latest_posts[0]->slug) }}" class="text-white">{{ $latest_posts[0]->titulo }}</a></h4>
                                    <ul class="widget">
                                        <li><span>por {{ $latest_posts[0]->author->full_name }}</span></li>
                                        <li><span>{{ $latest_posts[0]->difficulty->nome }}</span></li>
                                        <li><span>{{ $latest_posts[0]->qtd_porcao }} @if($latest_posts[0]->qtd_porcao > 1 ) Porções @else Porção @endif</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6  p-0">
                        @foreach($latest_posts->slice(1,-2)  as $post)
                        <div class="hero__inside__item hero__inside__item--small set-bg"
                            data-setbg="{{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}">
                            <div class="hero__inside__item__text">
                                <div class="hero__inside__item--meta">
                                    <span>{{ $post->created_at->format('d') }}</span>
                                    <p>{{ $post->created_at->format('M') }}</p>
                                </div>
                                <div class="hero__inside__item--text">
                                    <ul class="label">
                                        <li>{{ $post->category->nome }}</li>
                                    </ul>
                                    <h5><a href="{{ route('posts.show', $post->slug) }}" class="text-white">{{ $post->titulo }}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-3 col-md-6  p-0">
                        <div class="hero__inside__item set-bg" data-setbg="{{ asset($latest_posts[3]->image ? 'storage/' . $latest_posts[3]->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}">
                            <div class="hero__inside__item__text">
                                <div class="hero__inside__item--meta">
                                    <span>{{ $latest_posts[3]->created_at->format('d') }}</span>
                                    <p>{{ $latest_posts[3]->created_at->format('M') }}</p>
                                </div>
                                <div class="hero__inside__item--text">
                                    <ul class="label">
                                        <li>{{ $latest_posts[3]->category->nome }}</li>
                                    </ul>
                                    <h5><a href="{{ route('posts.show', $latest_posts[3]->slug) }}" class="text-white">{{ $latest_posts[3]->titulo }}</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Slide Part 2 --}}
        {{-- <div class="hero__item">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 p-0">
                        <div class="hero__inside__item hero__inside__item--wide set-bg"
                            data-setbg="{{ asset($latest_posts[0]->image ? 'storage/' . $latest_posts[0]->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}">
                            <div class="hero__inside__item__text">
                                <div class="hero__inside__item--meta">
                                    <span>08</span>
                                    <p>Aug</p>
                                </div>
                                <div class="hero__inside__item--text">
                                    <ul class="label">
                                        <li>{{ $latest_posts[0]->category->nome }}</li>
                                    </ul>
                                    <h4><a href="{{ route('posts.show', $latest_posts[0]->slug) }}" class="text-white">{{ $latest_posts[0]->titulo }}</a></h4>
                                    <ul class="widget">
                                        <li>by <span>Admin</span></li>
                                        <li>3 min read</li>
                                        <li>20 Comment</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6  p-0">
                        @foreach($latest_posts->slice(1,-2)  as $post)
                        <div class="hero__inside__item hero__inside__item--small set-bg"
                            data-setbg="{{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}">
                            <div class="hero__inside__item__text">
                                <div class="hero__inside__item--meta">
                                    <span>08</span>
                                    <p>Aug</p>
                                </div>
                                <div class="hero__inside__item--text">
                                    <ul class="label">
                                        <li>{{ $post->category->nome }}</li>
                                    </ul>
                                    <h5><a href="{{ route('posts.show', $post->slug) }}" class="text-white">{{ $post->titulo }}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-3 col-md-6  p-0">
                        <div class="hero__inside__item set-bg" data-setbg="{{ asset($latest_posts[3]->image ? 'storage/' . $latest_posts[3]->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}">
                            <div class="hero__inside__item__text">
                                <div class="hero__inside__item--meta">
                                    <span>08</span>
                                    <p>Aug</p>
                                </div>
                                <div class="hero__inside__item--text">
                                    <ul class="label">
                                        <li>{{ $latest_posts[3]->category->nome }}</li>
                                    </ul>
                                    <h5><a href="{{ route('posts.show', $latest_posts[3]->slug) }}" class="text-white">{{ $latest_posts[3]->titulo }}</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        
    </div>
</section>
<!-- Hero Section End -->
<!-- Categories Section Begin -->
<section class="categories spad">
    <div class="container">
        <div class="row">
            @for ($i = 0; $i < 4; $i++)
            @if($categories[$i]->nome != "Sem Categoria") 
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="categories__item set-bg" data-setbg="{{ asset($categories[$i]->imagem ? 'storage/' . $categories[$i]->imagem : 'img/placeholders/placeholder_post.jpg') }}">
                    <div class="categories__hover__text">
                        <h5><a class="text-black-50" href="{{ route('categories.show', $categories[$i]) }}">{{ $categories[$i]->nome }}</a></h5>
                        <p>{{ $categories[$i]->posts_count }} posts</p>
                    </div>
                </div>

            </div>
            @endif
            @endfor
            {{-- @foreach($categories->slice(2) as $category)
            @if($category->nome != "Sem Categoria") 
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="categories__item set-bg" data-setbg="{{ asset($category->imagem ? 'storage/' . $category->imagem : 'img/placeholders/placeholder_post.jpg') }}">
                    <div class="categories__hover__text">
                        <h5><a class="text-black-50" href="{{ route('categories.show', $category) }}">{{ $category->nome }}</a></h5>
                        <p>{{ $category->posts_count }} posts</p>
                    </div>
                </div>

            </div>
            @endif
            @endforeach --}}
        </div>
    </div>
    <div class="categories__post">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="categories__post__item categories__post__item--large">
                        <div class="categories__post__item__pic set-bg"
                            data-setbg="{{ asset($latest_posts[0]->image ? 'storage/' . $latest_posts[0]->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}">
                            <div class="post__meta">
                                <h4>{{ $latest_posts[0]->created_at->format('d') }}</h4>
                                <span>{{ $latest_posts[0]->created_at->format('M') }}</span>
                            </div>
                        </div>
                        <div class="categories__post__item__text">
                            <ul class="post__label--large">
                                <li>{{ $latest_posts[0]->category->nome }}</li>
                                {{-- <li>Desserts</li> --}}
                            </ul>
                            <h3><a href="{{ route('posts.show', $latest_posts[0]->slug) }}">{{ $latest_posts[0]->titulo }}</a></h3>
                            <ul class="post__widget">
                                <li>por <span>{{ $post->author->full_name }}</span></li>
                                <li>{{ $post->difficulty->nome }}</li>
                                <li>{{ $post->qtd_porcao }} @if($post->qtd_porcao > 1 ) Porções @else Porção @endif</li>
                            </ul>
                            <p>{{ $latest_posts[0]->resumo }}</p>
                            <a href="{{ route('posts.show', $latest_posts[0]->slug) }}" class="primary-btn">Ler mais</a>
                            {{-- <div class="post__social">
                                <span>Share</span>
                                <a href="#"><i class="fa fa-facebook"></i> <span>82</span></a>
                                <a href="#"><i class="fa fa-twitter"></i> <span>24</span></a>
                                <a href="#"><i class="fa fa-envelope-o"></i> <span>08</span></a>
                            </div> --}}
                        </div>
                    </div>
                    <!-- post-ads-2 -->
                    <x-blog.post-ads-2/>
                    <div class="row">
                        @forelse($posts as $post)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="categories__post__item">
                                <div class="categories__post__item__pic small__item set-bg"
                                    data-setbg="{{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}">
                                    <div class="post__meta">
                                        <h4>{{ $post->created_at->format('d') }}</h4>
                                        <span>{{ $post->created_at->format('M') }}</span>
                                    </div>
                                </div>
                                <div class="categories__post__item__text">
                                    <span class="post__label">{{ $post->category->nome }}</span>
                                    <h3><a href="{{ route('posts.show', $post->slug) }}">{{ $post->titulo }}</a></h3>
                                    <ul class="post__widget">
                                        <li>por <span>{{ $post->author->full_name }}</span></li>
                                        <li>{{ $post->difficulty->nome }}</li>
                                        <li>{{ $post->qtd_porcao }} @if($post->qtd_porcao > 1 ) Porções @else Porção @endif</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="lead">Nenhum post para mostrar.</p>
                        @endforelse
                        {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="categories__post__item">
                                <div class="categories__post__item__pic smaller__large set-bg"
                                    data-setbg="img/categories/categories-post/cp-3.jpg">
                                    <div class="post__meta">
                                        <h4>08</h4>
                                        <span>Aug</span>
                                    </div>
                                </div>
                                <div class="categories__post__item__text">
                                    <span class="post__label">Dinner</span>
                                    <h3><a href="#">17 Perfect Gifts for Your Vegan Friend Because Sometimes...</a>
                                    </h3>
                                    <ul class="post__widget">
                                        <li>by <span>Admin</span></li>
                                        <li>3 min read</li>
                                        <li>20 Comment</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt dolore magna aliqua. Quis ipsum suspendisse ultrices
                                        gravida...</p>
                                </div>
                            </div> 
                            
                        </div> --}}
                        <div class="col-lg-12 text-center">
                            {{ $posts->links() }}
                            <div class="load__more__btn">
                                {{-- <a href="#">Load more</a> --}}
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                            
                    <!-- About Me-->
                    <x-blog.side-about-me/>

                    <!-- Follow Us -->
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
</section>
<!-- Categories Section End -->

@endsection

@section("script")
@endsection