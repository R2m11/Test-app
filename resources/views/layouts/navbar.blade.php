<div class="main-header" data-background-color="red">
    <!-- Logo Header -->
    <div class="logo-header">
        <a href="/home" class="logo text-white">
            Test PT
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fa fa-bars"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
        <div class="navbar-minimize">
            <button class="btn btn-minimize btn-rounded">
                <i class="fa fa-bars"></i>
            </button>
        </div>
</div>
    <!-- End Logo Header -->
    <nav class="navbar navbar-header navbar-expand-lg">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="" data-background-color="bg1">
                            <h1 style="color:white">{{Auth::user()->name}}</h1>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <li>
                            <div class="user-box">
                                <p style="color: white">Data</p>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <h4 class="text-center">{{ Auth::user()->name }}</h4>
                            <p class="text-center text-muted">{{ Auth::user()->email }}</p>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin Mau logout?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"
                                data-dismiss="modal">Cancel</button>
                            <a href="{{ route('logout') }}" class="btn btn-danger"
                                onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
