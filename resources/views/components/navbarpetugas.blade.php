<nav class="navbar navbar-expand-md navbar-dark bg-darker">
    <div class="container">
            <a href="/petugas"><img src="{{asset('images/Logo.svg')}}" alt="Logo LaporAduan" class="navbar-brand"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-5">
                        <a href="{{url('/petugas/pengaduan')}}" class="nav-link {{ request()->is('petugas/*') ? 'active-green' : '' }}">Data Pengaduan</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth()->guard('petugas')->user()->nama_petugas}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/petugas/logout"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>Logout</a>
                        </div>
                    </li>
                </ul>
        </div>
    </div>
</nav>