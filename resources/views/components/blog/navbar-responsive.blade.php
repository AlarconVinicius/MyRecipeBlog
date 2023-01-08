<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="{{ route('home') }}"><img src="{{ asset('img/logos/Ideia_3-remove-bg-cut.png') }}" alt=""></a>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li><a href="{{ route('home') }}">Início</a></li>
            <li><a href="{{ route('categories.index') }}">Categoria</a></li>
            <li><a href="{{ route('about') }}">Sobre</a></li>
            @auth
            <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li><a href="#" onclick="event.preventDefault();
                document.getElementById('nav-logout-form').submit();">Sair</a>
                <form id="nav-logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
            @endauth
            {{-- <li class="dropdown"><a href="#">Pages</a>
                <ul class="dropdown__menu">
                    <li><a href="./categories-grid.html">Categories Grid</a></li>
                    <li><a href="./categories-list.html">Categories List</a></li>
                    <li><a href="./single-post.html">Single Post</a></li>
                    <li><a href="./signin.html">Sign In</a></li>
                    <li><a href="./404.html">404</a></li>
                    <li><a href="./typography.html">Typography</a></li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="humberger__menu__about">
        <div class="humberger__menu__title sidebar__item__title">
            <h6>Sobre Nós</h6>
        </div>
        <img src="{{ asset($setting->sobre_image ? $setting->sobre_image : 'storage/placeholders/placeholder_capa.webp' . '') }}" alt="">
        <p>{!! $setting->sobre_resumo !!}</p>
        <a href="{{ route('about') }}" class="primary-btn text-white">Ler mais</a>
        {{-- <div class="humberger__menu__about__social sidebar__item__follow__links">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-envelope-o"></i></a>
        </div> --}}
    </div>
    {{-- <div class="humberger__menu__subscribe">
        <div class="humberger__menu__title sidebar__item__title">
            <h6>Inscreva-se</h6>
        </div>
        <p>Inscreva-se no nosso newsletter para receber nossas novidades.</p>
        <form action="#">
            <input type="text" class="email-input" placeholder="Seu email">
            <label for="agree-check">
                Eu aceito os termos & condições
                <input type="checkbox" id="agree-check">
                <span class="checkmark"></span>
            </label>
            <button type="submit" class="site-btn">Inscreva-se</button>
        </form>
    </div> --}}
</div>
<!-- Humberger End -->