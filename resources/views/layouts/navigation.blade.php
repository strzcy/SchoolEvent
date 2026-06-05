<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}" style="color: white;">
            <i class="fas fa-calendar-alt me-2"></i>SchoolEvent
        </a>
        <button class="navbar-toggler navbar-toggler-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="box-shadow: none; border: none;">
            <span><img src="https://img.icons8.com/?size=100&id=101856&format=png&color=FFFFFF" style="width:35px; height: auto;" alt="="></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" style="color: white;">Beranda</a>
                </li>
                
                @auth
                    @if(Auth::user()->email === 'admin@school.com')
                        <li class="nav-item">
                            <a class="nav-link btn btn-success text-white mx-2" href="{{ route('events.create') }}">
                                <i class="fas fa-plus"></i> Tambah Acara
                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"style="color: white;">
                            <i class="fas fa-user-circle"></i> Halo, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link btn " style="color: #ffffff;" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn text-white" href="{{ route('register') }}">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>