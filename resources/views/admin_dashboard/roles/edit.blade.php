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
                            <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Regras</i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
            <!--end breadcrumb-->
            
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Editando: {{ $role->nome }}</h5>
                    <hr/>
                    <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="inputProductTitle" class="form-label">Nome</label>
                                                <input type="text" name="nome" value="{{ old('nome', $role->nome) }}" required class="form-control" id="inputProductTitle" placeholder="Enter product title">
    
                                                @error('nome')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="inputProductTitle" class="form-label">Permiss??es da Regra</label>
                                                <div class="row">
                                                    @foreach($permissions as $permission)
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input 
                                                                    style="cursor: pointer" 
                                                                    class="form-check-input" 
                                                                    type="checkbox" 
                                                                    name='permissions[]' 
                                                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}
                                                                    value="{{ $permission->id }}" 
                                                                    id="permission_{{ $permission->nome }}">
                                                                <label style="cursor: pointer"class="form-check-label" for="permission_{{ $permission->nome }}">{{ $permission->nome }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <a 
                                            class="col-md-2 btn btn-danger me-2"
                                            href="#" 
                                            onclick="event.preventDefault(); document.querySelector('#delete_role_{{ $role->id }}').submit()">Deletar Regra</a>
                                            <button class="col-2 btn btn-primary" type='submit'>Atualizar Regra</button>
                                        </div>
                                    </div>
                                
                                </div>
                            </div><!--end row-->
                        </div>
                    </form>
                    <form method="POST" action="{{ route('admin.roles.destroy', $role) }}" id="delete_role_{{ $role->id }}">@csrf @method('DELETE')</form>
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