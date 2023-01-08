@extends('main_layouts.master-auth')

@section('title', '404')
@section('content')

@section("style")
@endsection
<!-- Section 404 Begin -->
<section class="section-404">
    <div class="text-404">
        <h1>404</h1>
        <h3>Opps! Página não encontrada!</h3>
        <p>Desculpe, a página que você está procurando não existe, foi removida ou o nome mudou</p>
        <a href="{{ route("home") }}" class="site-btn">Voltar para o início</a>
    </div>
</section>
<!-- Section 404 End -->

@endsection

@section("script")
@endsection