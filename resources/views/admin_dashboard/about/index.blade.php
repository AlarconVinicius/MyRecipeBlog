@extends('admin_dashboard.layouts.app')

@section('title', $page_section_title)
@section('content')
@section("style")
<script src="https://cdn.tiny.cloud/1/966bvxgnw876uam359k6x0hl1748mknvtjo83mkosgndlwts/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
    
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
                            <li class="breadcrumb-item active" aria-current="page">{{ $main_section_title }}</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
            <!--end breadcrumb-->
            
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Editar Página Sobre</h5>
                    <hr/>
                    <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded row">
                                        <div class="col-12 mb-3">
                                            <label for="quem_somos" class="form-label">Quem somos</label>
                                            <textarea name="sobre_quem_somos" class="form-control" id="quem_somos" rows="3">{{ old('quem_somos', $setting->sobre_quem_somos) }}</textarea>

                                            @error('sobre_quem_somos')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="input_image" class="form-label">Imagem</label>
                                                    <input class="form-control" id="input_image" name="sobre_image" type="file">
        
                                                    @error('sobre_image')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <img style='width: 100%' src="{{ asset($setting->sobre_image ? 'storage/' . $setting->sobre_image : 'storage/placeholders/user_placeholder.png' . '') }}" alt="Foto do Sobre" class='img-responsive img-thumbnail p-2'>
                                            </div>
                                        </div>
                                        <button class="ms-3 col-2 btn btn-primary" type="submit">Atualizar</button>
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

        let initTinyMCE = (id) => {
            tinymce.init({
                selector: '#'+id,
                plugins: 'anchor autolink charmap codesample emoticons link lists searchreplace table visualblocks wordcount',
                toolbar: ' undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                height: 300,

            });
        }
        
        initTinyMCE('quem_somos');
    });
</script>
@endsection