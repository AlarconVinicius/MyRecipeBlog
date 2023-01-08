@extends('main_layouts.master')

@section('title', $page_section_title)
@section('content')

@section("style")
@endsection

<!-- About Section Begin -->
<section class="about spad">
    <div class="container">
        <div class="about__text">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h2>{{ $main_section_title }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home') }}">Início</a>
                            <span>{{ $main_section_title }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="about__pic__item__large">
                        <img src="{{ asset($setting->sobre_image ? $setting->sobre_image : 'storage/placeholders/placeholder_capa.webp' . '') }}" alt="">
                    </div>
                    {{-- <div class="about__pic">
                        <div class="about__pic__item">
                            <img src="{{ asset($setting->sobre_image ? $setting->sobre_image : 'storage/placeholders/placeholder_capa.webp' . '') }}" alt="">
                        </div>
                        <div class="about__pic__item">
                            <img src="{{ asset($setting->sobre_image ? $setting->sobre_image : 'storage/placeholders/placeholder_capa.webp' . '') }}" alt="">
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-6">
                    <div class="about__right__text">
                        {!! $setting->sobre_quem_somos !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->
@endsection

@section("script")
@endsection