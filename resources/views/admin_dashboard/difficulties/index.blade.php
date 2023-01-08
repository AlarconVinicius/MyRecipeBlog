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
								<li class="breadcrumb-item active" aria-current="page">{{ $main_section_title }}</li>
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
						  <div class="ms-auto"><a href="{{ route("admin.difficulties.create") }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add Dificuldade</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>Dificuldade#</th>
										<th>Nome</th>
										<th>Posts Relacionados</th>
										<th>Data de Criação</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($difficulties as $difficulty)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-0 font-14"># {{ $difficulty->id }} </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $difficulty->nome }}</td>
                                            <td><a class="btn btn-primary btn-sm" href="{{ route('admin.difficulties.show', $difficulty) }}">Posts Relacionados</a></td>
                                            <td>{{ $difficulty->created_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('admin.difficulties.edit', $difficulty) }}" class=""><i class='bx bxs-edit'></i></a>
                                                    <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_{{ $difficulty->id }}').submit()" class="ms-3"><i class='bx bxs-trash'></i></a>
                                                    <form method="POST" action="{{ route('admin.difficulties.destroy', $difficulty) }}" id="delete_form_{{ $difficulty->id }}">@csrf @method('DELETE')</form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
								</tbody>
							</table>
						</div>
                        <div class="mt-4">
                            {{ $difficulties->links() }}
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

	