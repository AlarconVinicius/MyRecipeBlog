@extends('main_layouts.master')

@section('title', $page_section_title)
@section('content')

@section("style")
@endsection

<!-- Page content-->
<div class="container mt-4">
    <h3 class="fw-bolder mb-3">{{ $main_section_title }}</h3>
    <div class="row">
        <!-- Blog Main-->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4 rounded-3 " >
                        <img class="card-img-top" src="{{ asset($setting->sobre_image ? $setting->sobre_image : 'storage/placeholders/placeholder_capa.webp' . '') }}" alt="Imagem do Sobre" />
                        {{-- <img class="card-img-top blog-img-post" src="{{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/placeholder_capa.webp' . '') }}" alt="..." /> --}}
                        
                    </div>   
                </div>
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4 rounded-3 " >
                        <div class="card-body">
                            <h5 class="card-title">Sobre Nós</h5>
                            <p class="card-text">{!! $setting->sobre_quem_somos !!}</p>
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