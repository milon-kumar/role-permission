<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="{{route('dashboard')}}" class="logo-dark">
                        <span class="logo-sm h3">D</span>
                    <span class="logo-lg h3">Dashboard</span>
                </a>
                <a href="index.html" class="logo logo-light">
                        <span class="logo-sm h3">D</span>
                    <span class="logo-lg h3">Dashboard</span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ auth()->user()->image ? asset(auth()->user()->image) : defaultImage(auth()->user()->name) }}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="Javascript:void(0)"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile" class="text-uppercase">{{ auth()->user()->type }}</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" style="cursor: pointer;" onclick="event.preventDefault();document.getElementById('logoutForm').submit()">
                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span>
                    </a>
                    <form action="{{ route('logout') }}" method="post" id="logoutForm">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
