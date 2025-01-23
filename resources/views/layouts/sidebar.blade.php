<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">

                    <div class="">
                        <img src="#" style="width: 100%" alt="">
                    </div>

                <div class="info">
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="/profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                            <a class="link-collapse text-dark" href="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal">Logout
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a href="/home">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
@if (Auth::user()->role->role == "admin")
                <li class="nav-item">
                    <a href="/user">
                        <i class="fa-solid fa-users"></i>
                        <p>Tambah User</p>
                    </a>
                </li>
@endif
                <li class="nav-item">
                    <a href="/room">
                        <i class="fa-solid fa-toolbox"></i>
                        <p>Data Ruangan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/bookingroom">
                        <i class="fa-regular fa-calendar-days"></i>
                        <p>Riwayat Peminjaman</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
