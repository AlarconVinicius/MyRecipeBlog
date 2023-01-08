@extends('admin_dashboard.layouts.app')

@section('title', $page_section_title)
@section('content')

@section("style")
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
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						  <div class="ms-auto"><a href="{{ route("admin.posts.create") }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add Post</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>Post#</th>
										<th>Título</th>
										<th>Resumo</th>
										<th>Categoria</th>
										<th>Data de Criação</th>
										<th>Status</th>
										<th>Views</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($difficulty->posts as $post)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-0 font-14"># {{ $post->id }} </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $post->titulo }}</td>
                                            <td>{{ $post->resumo }}</td>
                                            <td>{{ $post->category->nome }}</td>
                                            <td>{{ $post->created_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="badge rounded-pill @if($post->status === 'publicado') {{ 'text-info bg-light-info' }} @elseif($post->status === 'rascunho') {{ 'text-warning bg-light-warning' }} @else {{ 'text-danger bg-light-danger' }} @endif p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>{{ $post->status }}</div>
                                            </td>
                                            <td>{{ $post->views }}</td>
                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('admin.posts.edit', $post) }}" class=""><i class='bx bxs-edit'></i></a>
                                                    <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_{{ $post->id }}').submit()" class="ms-3"><i class='bx bxs-trash'></i></a>
                                                    <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" id="delete_form_{{ $post->id }}">@csrf @method('DELETE')</form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
								</tbody>
							</table>
						</div>
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
@endsection

	