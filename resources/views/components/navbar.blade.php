<nav class="navbar navbar-expand-md navbar-dark bg-darker">
    <div class="container">
            <a href="/"><img src="{{asset('images/Logo.svg')}}" alt="Logo LaporAduan" class="navbar-brand"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-5">
                        <a href="{{url('/data_pengaduan')}}" class="nav-link {{ request()->is('data_pengaduan') ? 'active-green' : '' }}">Data Pengaduanku</a>
                    </li>
                    @if (Auth()->guard('masyarakat')->check())
                        <li class="nav-item ml-5 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth()->guard('masyarakat')->user()->nama}}
                                <i class="fas fa-fw fa-user"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>Logout</a>
                            </div>
                        </li>
                    @endif
                    @if (!Auth()->guard('masyarakat')->check())
                        <li class="nav-item ml-5">
                            <a class="btn btn-block btn-info rounded-pill" href="/data_pengaduan">Login</a>
                        </li>
                    @endif
                </ul>
        </div>
    </div>
</nav>