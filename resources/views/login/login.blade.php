<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <title>Đăng nhập</title>
    <!--    /*=================== Logo Web ====================*/    -->
    <link rel="icon" href="{{asset('img/logo/logo-web.jpg')}}" type="image/jpg"/>

    <!--    /*=================== Bootstrap CSS ====================*/    -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}"/>

    <!--    /*=================== Dashboard Default CSS ====================*/    -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout-dashboard/style.css') }}"/>

    <!--    /*=================== Dashboard Theme CSS ====================*/    -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout-dashboard/colors/blue.css') }}"/>

    <!--    /*=================== Boostrap JS ====================*/    -->
    <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>

</head>

<body>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper" class="login-register login-sidebar"
         style="background-image:url(img/background/login-cover.jpg);">
    <div class="login-box card">
        <div class="card-body">
            <form class="form-horizontal form-material" id="loginform" action="login" method="POST">
                {{ csrf_field() }}
                <h2>Hệ thống quản lý giáo dục</h2>
                <a>Trường THPT Chuyên Nguyễn Tất Thành</a>

                <div class="form-group m-t-40">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Tài khoản" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="" placeholder="Mật khẩu" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="d-flex no-block align-items-center">
                        <div class="checkbox checkbox-primary p-t-0">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> Nhớ mật khẩu </label>
                        </div>
                        <div class="ml-auto">
                            <a href="javascript:void(0)" id="to-recover" class="text-muted"><i
                                    class="fa fa-lock m-r-5"></i> Quên mật khẩu </a>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">Đăng nhập
                        </button>
                    </div>
                </div>


            </form>

            <form class="form-horizontal" id="recoverform"
                  action="https://www.wrappixel.com/demos/admin-templates/material-pro/minisidebar/index.html">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>Khôi phục mật khẩu</h3>
                        <p class="text-muted">Hãy nhập địa chỉ Email của bạn! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Email">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">Gửi
                        </button>
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">Quay lại
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if (exist) {
            alert(msg);
        }
    </script>
</section>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->

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
