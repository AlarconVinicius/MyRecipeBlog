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
                    <div class="col-lg-12 col-md-8">
                        <div class="breadcrumb__text">
                            <h2>Categorias: </h2>
                            <div class="breadcrumb__option">
                                <a href="{{ route('home') }}">Início</a>
                                <span>Categorias</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="container">
                                    <div class="row">
                                        @foreach($categories as $category)
                                        @if($category->nome != "Sem Categoria")
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <div class="categories__item set-bg" data-setbg="{{ asset($category->imagem ? 'storage/' . $category->imagem : 'img/placeholders/placeholder_post.jpg') }}">
                                                <div class="categories__hover__text">
                                                    <h5><a class="text-black-50" href="{{ route('categories.show', $category) }}">{{ $category->nome }}</a></h5>
                                                    <p>{{ $category->posts_count }} posts</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                            {{-- <div class="col-lg-12 text-center">
                                <div class="load__more__btn">
                                    <a href="#">Load more</a>
                                </div>
                            </div> --}}
                        </div>
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