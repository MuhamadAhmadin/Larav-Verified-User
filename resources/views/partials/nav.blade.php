@yield('nav')
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
<div class="sidebar-header">
    <div class="d-flex justify-content-between">
        <div class="logo">
            <a href="#"><img src="#" alt="" srcset="">COD-IN</a>
        </div>
        <div class="toggler">
            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
    </div>
</div>
<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>
        
        <li class="sidebar-item  ">
            <a href="/home" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <li class="sidebar-item">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-wallet"></i>
                <span>Balance</span>
            </a>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Api Center</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="#">E-KYC &nbsp;</span><span class="badge bg-light-info">New</span></a>
                </li>
                <li class="submenu-item ">
                    <a href="#">Phone Tags&nbsp;</span><span class="badge bg-light-info">New</span></a>
                </li>
            </ul>
        </li>
        
        <li class="sidebar-item">
            <a href="{{ url('/pembelian') }}" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Pembelian Saya</span>
            </a>
        </li>
        
        <li class="sidebar-item">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Token</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-hexagon-fill"></i>
                <span>Contact Us</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="form-element-input.html">Input</a>
                </li>
                <li class="submenu-item ">
                    <a href="form-element-input-group.html">Input Group</a>
                </li>
                <li class="submenu-item ">
                    <a href="form-element-select.html">Select</a>
                </li>
                <li class="submenu-item ">
                    <a href="form-element-radio.html">Radio</a>
                </li>
                <li class="submenu-item ">
                    <a href="form-element-checkbox.html">Checkbox</a>
                </li>
                <li class="submenu-item ">
                    <a href="form-element-textarea.html">Textarea</a>
                </li>
            </ul>
        </li>
        {{-- Admin Menu --}}
        @role('admin')
        <li class="sidebar-item has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-folder-symlink-fill"></i>
                <span>Admin Access</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a class="dropdown-item {{ (Request::is('roles') || Request::is('permissions')) ? 'active' : null }}" href="{{ route('laravelroles::roles.index') }}">
                        {!! trans('titles.laravelroles') !!}
                    </a>
                </li>
                <li class="submenu-item ">
                    <a class="dropdown-item {{ Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/users') }}">
                        {!! trans('titles.adminUserList') !!}
                    </a>
                </li>
                <li class="submenu-item ">
                    <a class="dropdown-item {{ Request::is('users/create') ? 'active' : null }}" href="{{ url('/users/create') }}">
                        {!! trans('titles.adminNewUser') !!}
                    </a>
                </li>
                <li class="submenu-item ">
                    <a class="dropdown-item {{ Request::is('themes','themes/create') ? 'active' : null }}" href="{{ url('/themes') }}">
                        {!! trans('titles.adminThemesList') !!}
                    </a>
                </li>
                <li class="submenu-item ">
                    <a class="dropdown-item {{ Request::is('logs') ? 'active' : null }}" href="{{ url('/logs') }}">
                        {!! trans('titles.adminLogs') !!}
                    </a>
                </li>
                <li class="submenu-item ">
                    <a class="dropdown-item {{ Request::is('activity') ? 'active' : null }}" href="{{ url('/activity') }}">
                        {!! trans('titles.adminActivity') !!}
                    </a>
                </li>
                <li class="submenu-item ">
                    <a class="dropdown-item {{ Request::is('phpinfo') ? 'active' : null }}" href="{{ url('/phpinfo') }}">
                        {!! trans('titles.adminPHP') !!}
                    </a>
                </li>
                <li class="submenu-item ">
                    <a class="dropdown-item {{ Request::is('routes') ? 'active' : null }}" href="{{ url('/routes') }}">
                        {!! trans('titles.adminRoutes') !!}
                    </a>
                </li>
                <li class="submenu-item ">
                    <a class="dropdown-item {{ Request::is('active-users') ? 'active' : null }}" href="{{ url('/active-users') }}">
                        {!! trans('titles.activeUsers') !!}
                    </a>
                </li>
                <li class="submenu-item ">
                    <a class="dropdown-item {{ Request::is('blocker') ? 'active' : null }}" href="{{ route('laravelblocker::blocker.index') }}">
                        {!! trans('titles.laravelBlocker') !!}
                    </a>
                </li>
        @endrole        
    </ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
    </div>
    <div id="main" class='layout-navbar'>
        <header class='mb-3'>
            <nav class="navbar navbar-expand navbar-light ">
                <div class="container-fluid">
                    <a href="#" class="burger-btn d-block">
                        <i class="bi bi-justify fs-3"></i>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown me-1">
                                <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Mail</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">No new mail</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown me-3">
                                <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Notifications</h6>
                                    </li>
                                    <li><a class="dropdown-item">No notification available</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex">
                                    <div class="user-name text-end me-3">
                                        <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                                        <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                                    </div>
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            @if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1)
                                <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}" class="user-avatar-nav">
                            @else
                                <div class="user-avatar-nav"></div>
                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <h6 class="dropdown-header">Hello, {{ Auth::user()->name }}</h6>
                                </li>
                                <li><a class="dropdown-item{{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'active' : null }}" href="{{ url('/profile/'.Auth::user()->name) }}"><i class="icon-mid bi bi-person me-2"></i>{!! trans('titles.profile') !!}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item"  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                    
                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        </div>
    </div>
</div>