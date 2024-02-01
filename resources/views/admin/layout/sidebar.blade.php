<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/home')}}" class="brand-link">
         <img src="{{url('admin/images/logo2.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Portsaid University</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
{{--            <div class="image">--}}
{{--                <img src="{{url('admin/images/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">--}}
{{--            </div>--}}
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
{{--        <div class="form-inline">--}}
{{--            <div class="input-group" data-widget="sidebar-search">--}}
{{--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <div class="input-group-append">--}}
{{--                    <button class="btn btn-sidebar">--}}
{{--                        <i class="fas fa-search fa-fw"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{url('admin/admins')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Admin </p>
                    </a>
                </li>

                <!-- User CRUD -->
                <!-- <li class="nav-item">
                    <a href="{{url('admin/users')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{ url('admin/calendar/select') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>Calendar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/department') }}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Department</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{ url('admin/course') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Course</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/instrusctor') }}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>Instrusctor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/room') }}" class="nav-link">
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>Room</p>
                    </a>
                </li>                   
                <li class=" user-panel d-flex nav-item">
                    <a href="{{ url('admin/logout') }}" class="nav-link"><i
                            class="nav-icon fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
