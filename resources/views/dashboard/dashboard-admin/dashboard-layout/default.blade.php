<!DOCTYPE html>
<html>
@include('dashboard.dashboard-admin.dashboard-layout.head')
<body>
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('/')}}">
                    <!-- Logo icon -->
                    <b>
                        <img src="{{ asset('img/logo/logo-sms.jpg') }}" alt="logo" class="dark-logo"/>
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span>
                         <img src="{{ asset('img/logo/logo-text-sms.png') }}" alt="logo text" class="dark-logo"/>
                    </span>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                            href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                    <li class="nav-item"><a
                            class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item hidden-sm-down search-box">
                        <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i
                                class="ti-search"></i></a>
                        <form class="app-search">
                            <input type="text" class="form-control" placeholder="Tìm kiếm"> <a class="srh-btn"><i
                                    class="ti-close"></i></a></form>
                    </li>
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-lg-0">
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="2"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="mdi mdi-email"></i>
                            <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                        </a>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="{{ asset($admin_info->avt)}}" alt="user" class="profile-pic"/></a>
                        <div class="dropdown-menu dropdown-menu-right scale-up">
                            <ul class="dropdown-user">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-img"><img src="{{ asset($admin_info->avt)}}" alt="user"></div>
                                        <div class="u-text">
                                            <h4>{{$user->name}}</h4>
                                            <p>{{$user->email}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{url('/sms_admin')}}"><i class="ti-user"></i> Hồ sơ </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{url('/logout')}}"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- Language -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- User profile -->
            <div class="user-profile" style="background: url('{{asset('img/logo/logo-background.jpg')}}')  no-repeat;">
                <!-- User profile image -->
                <div class="profile-img"><img src="{{ asset($admin_info->avt)}}" alt="user"/></div>
                <!-- User profile text-->
                <div class="profile-text"><a class="user-name">{{$admin_info->name}}</a></div>
            </div>
            <!-- End User profile text-->
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">Quản lý hồ sơ</li>
                    <li><a href="{{url('/sms_admin')}}" aria-expanded="false"><i class="mdi mdi-account"></i><span
                                class="hide-menu">Thông tin cá nhân </span></a></li>
                    <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                class="mdi mdi-account-edit"></i><span class="hide-menu">Cập nhật thông tin</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('sms_admin/editProfile')}}">Thông tin cá nhân </a></li>
                            <li><a href="{{url('sms_admin/editPassword')}}">Đổi mật khẩu </a></li>
                        </ul>
                    </li>
                    <li class="nav-devider"></li>
                    <li class="nav-small-cap">Quản lý tài khoản</li>
                    <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                class="mdi mdi-account-edit"></i><span class="hide-menu">Quản lý người dùng</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('sms_admin/studentManager')}}">Tài khoản học sinh </a></li>
                            <li><a href="{{url('sms_admin/teacherManager')}}">Tài khoản giáo viên </a></li>
                        </ul>
                    </li>
                    <li class="nav-devider"></li>
                    <li class="nav-small-cap">Quản lý đào tạo</li>
                    <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                class="mdi mdi-account-edit"></i><span class="hide-menu">Thời khoá biểu</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('sms_admin/showTimeTable')}}">Xem TKB </a></li>
                            <li><a href="{{url('sms_admin/editTimeTable')}}">Xếp TKB </a></li>
                        </ul>
                    </li>
                    <li class="nav-devider"></li>
                    <li><a href="{{url('/logout')}}"><i class="mdi mdi-logout"></i><span class="hide-menu">Đăng xuất</span></a>
                    <li class="nav-devider"></li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
    @yield('content')

    <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            Bản quyền thuộc về Lã Vũ Hoàng - Đại học bách khoa Hà Nội © 2020 All right reserved
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>

<!--    /*=================== Pop-up JS ====================*/    -->
<script src="{{ asset('js/js-dashboard/dashboard-default/popper.js')}}"></script>

<!--    /*=================== Slim Scroll JS ====================*/    -->
<script src="{{ asset('js/js-dashboard/dashboard-default/jquery.slimscroll.js')}}"></script>

<!--    /*=================== Wave Effects JS  ====================*/    -->
<script src="{{ asset('js/js-dashboard/dashboard-default/waves.js')}}"></script>

<!--    /*=================== Stickey Kit JS  ====================*/    -->
<script src="{{ asset('js/js-dashboard/dashboard-default/sticky-kit.min.js')}}"></script>

<!--    /*=================== Menu sidebar JS  ====================*/    -->
<script src="{{ asset('js/js-dashboard/dashboard-default/sidebarmenu.js')}}"></script>

<!--    /*=================== Custom JS  ====================*/    -->
<script src="{{ asset('js/js-dashboard/dashboard-default/custom.min.js')}}"></script>

</body>
</html>
