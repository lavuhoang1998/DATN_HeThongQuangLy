<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <title>Page Not Found!</title>
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


<body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper" class="error-page">
    <div class="error-box">
        <div class="error-body text-center">
            <h1 class="text-info">400</h1>
            <h3 class="text-uppercase">Page Not Found !</h3>
            <br>
            <a href="{{url('/')}}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Trang chủ</a> </div>
    </div>
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
