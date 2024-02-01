
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{url('admin/images/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>
    @include('admin.layout.header')
    <!-- Main Sidebar Container -->
    @include('admin.layout.sidebar')
    <div class="content-wrapper" style="height: fit-content;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
            <div class="container-fluid">
            @include('admin.layout.messages')
        <!-- Content Wrapper. Contains page content -->
            @yield('content')
            </div>
    </div>
    <!-- /.content-wrapper -->
    @include('admin.layout.footer')

</div>

<!-- ./wrapper -->

