<!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">    
            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>  
            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('backend/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        {{auth()->user()->name}} <i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>
                    <a href="{{ route('panel.user.index') }}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item notify-item"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        >
                        <i class="fe-log-out"></i>
                        <span>Logout</span>                
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                    </form>
                </div>
            </li>    
        </ul>    
        <div class="logo-box">    
            <a href="{{ route('main') }}" class="logo logo-light text-center">
                <span class="logo-sm text-white font-weight-bold">
                    SISS
                </span>
                <span class="logo-lg text-white font-weight-bold">
                    SISS
                </span>
            </a>
        </div>    
        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </li>               
            
        </ul>
        <div class="clearfix"></div>
    </div>
</div>