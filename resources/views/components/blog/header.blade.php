<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-1 col-6 order-md-1 order-1">
                    <div class="header__humberger">
                        <i class="fa fa-bars humberger__open"></i>
                    </div>
                </div>
                <div class="col-lg-8 col-md-10 order-md-2 order-3">
                    <nav class="header__menu">
                        <ul>
                            <li class="{{ preg_match('/home/', Route::currentRouteName()) ? 'active' : '' }}"><a href="{{ route('home') }}">Início</a></li>
                            {{-- <li><a href="#">Recipes</a>
                                <div class="header__megamenu__wrapper">
                                    <div class="header__megamenu">
                                        <div class="header__megamenu__item">
                                            <div class="header__megamenu__item--pic set-bg"
                                                data-setbg="img/megamenu/p-1.jpg">
                                                <div class="label">Vegan</div>
                                            </div>
                                            <div class="header__megamenu__item--text">
                                                <h5><a href="#">How to Make a Milkshake With Any Ice Cream ...</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="header__megamenu__item">
                                            <div class="header__megamenu__item--pic set-bg"
                                                data-setbg="img/megamenu/p-2.jpg">
                                                <div class="label">Vegan</div>
                                            </div>
                                            <div class="header__megamenu__item--text">
                                                <h5><a href="#">How to Make a Milkshake With Any Ice Cream ...</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="header__megamenu__item">
                                            <div class="header__megamenu__item--pic set-bg"
                                                data-setbg="img/megamenu/p-3.jpg">
                                                <div class="label">Vegan</div>
                                            </div>
                                            <div class="header__megamenu__item--text">
                                                <h5><a href="#">How to Make a Milkshake With Any Ice Cream ...</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="header__megamenu__item">
                                            <div class="header__megamenu__item--pic set-bg"
                                                data-setbg="img/megamenu/p-4.jpg">
                                                <div class="label">Vegan</div>
                                            </div>
                                            <div class="header__megamenu__item--text">
                                                <h5><a href="#">How to Make a Milkshake With Any Ice Cream ...</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="header__megamenu__item">
                                            <div class="header__megamenu__item--pic set-bg"
                                                data-setbg="img/megamenu/p-5.jpg">
                                                <div class="label">Vegan</div>
                                            </div>
                                            <div class="header__megamenu__item--text">
                                                <h5><a href="#">How to Make a Milkshake With Any Ice Cream ...</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}
                            <li class="{{ preg_match('/categories/', Route::currentRouteName()) ? 'active' : '' }}"><a href="{{ route('categories.index') }}">Categoria</a></li>
                            {{-- <li><a href="#">Desserts</a></li>
                            <li class="dropdown"><a href="#">Pages</a>
                                <ul class="dropdown__menu">
                                    <li><a href="./categories-grid.html">Categories Grid</a></li>
                                    <li><a href="./categories-list.html">Categories List</a></li>
                                    <li><a href="./single-post.html">Single Post</a></li>
                                    <li><a href="./signin.html">Sign In</a></li>
                                    <li><a href="./404.html">404</a></li>
                                    <li><a href="./typography.html">Typography</a></li>
                                </ul>
                            </li> --}}
                            <li class="{{ preg_match('/about/', Route::currentRouteName()) ? 'active' : '' }}"><a href="{{ route('about') }}">Sobre</a></li>
                            @auth
                            <li class="{{ preg_match('/admin/', Route::currentRouteName()) ? 'active' : '' }}"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page"  
                                onclick="event.preventDefault();
                                document.getElementById('nav-logout-form').submit();"
                                href="#">Sair</a>
                                <form id="nav-logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                            @endauth
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-1 col-6 order-md-3 order-2">
                    <div class="header__search">
                        <i class="fa fa-search search-switch"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                {{-- <div class="header__btn">
                    <a href="{{ route('home') }}" class="primary-btn">Subscribe</a>
                </div> --}}
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('img/logos/Receitas de Casal Banner-cut.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                {{-- <div class="header__social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-envelope-o"></i></a>
                </div> --}}
            </div>
        </div>
    </div>
</header>
<!-- Header Section End -->
