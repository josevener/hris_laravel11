<div class="header">
    <div class="header-left">
        <a href="{{ route('dashboard') }}" class="logo cursor-pointer">
            <img src="{{ asset( Auth::user()->profile_image ?? 'assets/images/photo_defaults.jpg') }}" width="40"
                height="40" alt="User Avatar">
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    <div class="page-title-box">
        <h3>Hi, {{ Auth::user()->name ?? 'User' }}</h3>
    </div>
    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link d-flex align-items-center" data-toggle="dropdown">
                <span
                    class="user-img rounded-circle border d-flex align-items-center justify-content-center overflow-hidden"
                    style="width: 40px; height: 40px;">
                    <img src="{{ asset(Auth::user()->profile_image ?? 'assets/images/photo_defaults.jpg') }}"
                        alt="User Avatar" class="w-100 h-100 object-fit-cover">
                    <span class="status online"></span>
                </span>
                <span class="ml-2">{{ Auth::user()->name ?? 'User' }}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('profile.show', Auth::user()->employeeId) }}">My Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="dropdown-item" type="submit">Logout</button>
                </form>
            </div>
        </li>
    </ul>

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-ellipsis-v"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">My Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
