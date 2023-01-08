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
                    <h5 class="card-title">Nova Categoria</h5>
                    <hr/>
                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label for="inputProductTitle" class="form-label">Nome</label>
                                                <input type="text" name="nome" value="{{ old('nome') }}" required class="form-control" id="inputProductTitle" placeholder="Enter product title">
    
                                                @error('nome')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="inputProductTitle" class="form-label">Slug</label>
                                                <input type="text" name="slug" value="{{ old('slug') }}" required class="form-control" id="inputProductTitle" placeholder="Enter product title">
    
                                                @error('slug')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="mb-3">
                                                    <label for="input_image" class="form-label">Imagem</label>
                                                    <input class="form-control" id="input_image" name="imagem" type="file">
        
                                                    @error('imagem')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button class="col-2 btn btn-primary" type='submit'>Adicionar Categoria</button>
                                    </div>
                                
                                </div>
                            </div><!--end row-->
                        </div>
                    </form>
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