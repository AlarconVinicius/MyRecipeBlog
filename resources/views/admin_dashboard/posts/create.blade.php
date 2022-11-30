@extends('admin_dashboard.layouts.app')

@section('title', $page_section_title)
@section('content')
@section("style")

<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_dashboard_assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />

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
                            <li class="breadcrumb-item active" aria-current="page">Posts</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
            <!--end breadcrumb-->
            
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Novo Post</h5>
                    <hr/>
                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded row">
                                        <div class="col-6 mb-3">
                                            <label for="inputProductTitle" class="form-label">Título</label>
                                            <input type="text" name="titulo" value="{{ old('titulo') }}" required class="form-control" id="inputProductTitle" placeholder="Enter product title">

                                            @error('titulo')
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
                                        <div class="col-3 mb-3">
                                            <label for="inputProductDescription" class="form-label">Categoria</label>
                                            <div class="mb-3">
                                                <select name="category_id" required class="single-select">
                                                    @foreach($categories as $key => $category)
                                                    <option value="{{ $key }}">{{ $category }}</option>
                                                    @endforeach
                                                </select>

                                                @error('category_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-3 mb-3">
                                            <label class="form-label">Tags</label>
                                            <input type="text" class="form-control" data-role="tagsinput" name="tags" value="{{ old('tags') }}">
                                        </div>

                                        <div class="col-3 mb-3">
                                            <label for="inputProductTitle" class="form-label">Tempo de Preparo</label>
                                            <input type="number" name="tempo_preparo"  value="{{ old('tempo_preparo') }}" required class="form-control" id="inputProductTitle" placeholder="Enter product title">

                                            @error('tempo_preparo')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-3 mb-3">
                                            <label for="inputProductTitle" class="form-label">Quantidade de Porções</label>
                                            <input type="number" name="qtd_porcao" value="{{ old('qtd_porcao') }}" required class="form-control" id="inputProductTitle" placeholder="Enter product title">

                                            @error('qtd_porcao')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-3 mb-3">
                                            <label for="inputProductDescription" class="form-label">Dificuldade</label>
                                            <div class="mb-3">
                                                <select name="difficulty_id" class="single-select">
                                                    @foreach($categories as $key => $category)
                                                    <option value="{{ $key }}">{{ $category }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="inputProductDescription" class="form-label">Tag</label>
                                            <div class="mb-3">
                                                <select class="single-select">
                                                    @foreach($categories as $key => $category)
                                                    <option value="{{ $key }}">{{ $category }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Resumo</label>
                                            <textarea class="form-control" name="resumo" required id="inputProductDescription" rows="2">{{ old('resumo') }}</textarea>

                                            @error('resumo')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Conteúdo</label>
                                            <textarea id="post_content" class="form-control" id="inputProductDescription" name="conteudo" rows="3">{{ old('conteudo') }}</textarea>

                                            @error('conteudo')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Imagem da Capa</label>
                                            <input id="capa_post" name="capa_post" value="{{ old('capa_post') }}" type="file" accept="image/*">

                                            @error('capa_post')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button class=" col-2 btn btn-primary" type='submit'>Adicionar Post</button>
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
<script src="{{ asset('admin_dashboard_assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/input-tags/js/tagsinput.js') }}"></script>
<script>
    $(document).ready(function () {
    

        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });

        tinymce.init({
            selector: '#post_content',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: ' undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            height: 450,

            image_title: true,
            automatic_uploads: true,

            images_upload_handler: function(blobinfo, success, failure)
            {
                let formData = new FormData();
                let _token = $("input[name='_token']").val();

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "{{ route('admin.upload_tinymce_image') }}");
                xhr.onload = () => {
                    if( xhr.status !== 200 )
                    {
                        failure("Http Error: " + xhr.status)
                        return
                    }
                    let json = JSON.parse(xhr.responseText)
                    if( ! json || typeof json.location != 'string')
                    {
                        failure("Invalid Json: " + xhr.responseText)
                        return
                    }
                    success( json.location )
                }
                formData.append('_token', _token);
                formData.append('file', blobinfo.blob(), blobinfo.filename());
                xhr.send( formData );
            }
        });

        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);
    });
</script>
@endsection