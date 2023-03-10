<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('admin_dashboard_assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">MYBLOG</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('admin.index') }}">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                        </div>
                        <div class="menu-title">Posts</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.posts.index') }}"><i class="bx bx-right-arrow-alt"></i>All Posts</a>
                        </li>
                        <li> <a href="{{ route('admin.posts.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New Posts</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-menu'></i>
                        </div>
                        <div class="menu-title">Categorias</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.categories.index') }}"><i class="bx bx-right-arrow-alt"></i>Categorias</a>
                        </li>
                        <li> <a href="{{ route('admin.categories.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Categoria</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.tags.index') }}">
                    <div class="parent-icon"><i class='bx bx-purchase-tag'></i></div>
                        <div class="menu-title">Tags</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-menu'></i>
                        </div>
                        <div class="menu-title">Dificuldade</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.difficulties.index') }}"><i class="bx bx-right-arrow-alt"></i>Dificuldades</a>
                        </li>
                        <li> <a href="{{ route('admin.difficulties.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Dificuldade</a>
                        </li>
                        
                    </ul>
                </li>
                <hr>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-key'></i>
                        </div>
                        <div class="menu-title">Regras</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.roles.index') }}"><i class="bx bx-right-arrow-alt"></i>Regras</a>
                        </li>
                        <li> <a href="{{ route('admin.roles.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Regra</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-user'></i>
                        </div>
                        <div class="menu-title">Usu??rios</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.users.index') }}"><i class="bx bx-right-arrow-alt"></i>Usu??rios</a>
                        </li>
                        <li> <a href="{{ route('admin.users.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Usu??rios</a>
                        </li>
                        
                    </ul>
                </li>
                <hr>
                <li>
                    <a href="{{ route('admin.setting.edit') }}">
                    <div class="parent-icon"><i class='bx bx-layout'></i></div>
                        <div class="menu-title">Configura????o</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->