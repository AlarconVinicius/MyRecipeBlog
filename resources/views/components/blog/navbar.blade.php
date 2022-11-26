<nav class="navbar navbar-expand-lg navbar-dark p-3" style="background-color: rgb(255, 106, 40);">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Receitas de Casal!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Início</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categorias</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Sobre</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contato</a></li>
                @guest
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('login') }}">Entrar / Registrar</a></li>
                @endguest
                @auth
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('admin.posts.create') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page"  
                        onclick="event.preventDefault();
                        document.getElementById('nav-logout-form').submit();"
                        href="#">Sair</a>
                        <form id="nav-logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">{{ auth()->user()->first_name }} <span class="caret"></span></a>
                    </li> --}}
                @endauth
            </ul>
        </div>
    </div>
</nav>