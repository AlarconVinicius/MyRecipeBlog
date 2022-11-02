@extends('main_layouts.master')

@section('title', $page_section_title)
@section('content')

<!-- Page content-->
<div class="container mt-4">
    <h3 class="fw-bolder mb-3">{{ $main_section_title }}</h3>
    <div class="row">
        <!-- Blog Main-->
        <div class="col-lg-12">
            <div class="row">
                @forelse($categories as $category)
                <div class="col-md-3">
                    <!-- Blog post-->
                    <div class="card mb-4 rounded-5 " >
                        <div class="card-body">
                            <a href="{{ route('categories.show', $category) }}">{{ $category->nome }}</a>
                            <p class="badge bg-secondary text-decoration-none link-light" href="#!"><span>{{ $category->posts_count }}</span></p>                            
                        </div>
                    </div>   
                </div>
                @empty
                    <p class="lead">Nenhuma categoria para exibir</p>
                @endforelse
                {{ $categories->links() }}
                
            </div>
        </div>
        
    </div>
</div>
@endsection