@extends('admin_dashboard.layouts.app')

@section('title', $page_section_title)
@section('content')
    
    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">{{ $main_section_title }}</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
            <!--end breadcrumb-->
            
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Editar Categoria: {{ $category->nome }}</h5>
                    <hr/>
                    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label for="inputProductTitle" class="form-label">Nome</label>
                                                <input type="text" name="nome" value="{{ old('nome', $category->nome) }}" required class="form-control" id="inputProductTitle" placeholder="Enter product title">
    
                                                @error('nome')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="inputProductTitle" class="form-label">Slug</label>
                                                <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" required class="form-control" id="inputProductTitle" placeholder="Enter product title">
    
                                                @error('slug')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label for="input_image" class="form-label">Imagem</label>
                                                            <input class="form-control" id="input_image" name="imagem" type="file">
                
                                                            @error('imagem')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img style='width: 100%' src="{{ asset($category->imagem ? 'storage/' . $category->imagem : 'img/placeholders/placeholder_post.jpg') }}" alt="Foto do Sobre" class='img-responsive img-thumbnail p-2'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class='row'>
                                            <a 
                                            class="col-md-2 btn btn-danger me-2"
                                            href="#" 
                                            onclick="event.preventDefault(); document.querySelector('#delete_category_{{ $category->id }}').submit()">Deletar Categoria</a>
                                            <button class="col-md-2 btn btn-primary me-3" type='submit'>Atualizar Categoria</button>
                                                                                       
                                        </div>
                                    </div>
                                
                                </div>
                            </div><!--end row-->
                        </div>
                    </form>
                    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" id="delete_category_{{ $category->id }}">@csrf @method('DELETE')</form>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
    @endsection

@section("script")
<script>
    $(document).ready(function () {
        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);
    });
</script>
@endsection