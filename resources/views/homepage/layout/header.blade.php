<!--================ Start Header Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{url('/')}}">
                    <img src="{{asset('img/logo/logo-header.png')}}" alt=""/>
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/home')}}">Trang chủ</a>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a
                                href="#"
                                class="nav-link dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Giới thiệu</a
                            >
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Giới thiệu chung</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Cơ cấu tổ chức</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown active">
                            <a
                                href="#"
                                class="nav-link dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Lịch công tác</a
                            >
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="blog.html">Thời khoá biểu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="single-blog.html">Lịch làm việc</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a
                                href="#"
                                class="nav-link dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Thông báo</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">TB của SGD</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">TB của trường</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a
                                href="#"
                                class="nav-link dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Tài nguyên</a
                            >
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Ảnh</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Video</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Tài liệu</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a
                                href="#"
                                class="nav-link dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Tuyển dụng</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Nhân sự</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Tuyển sinh</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="search.html">Tìm kiếm</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Home Banner Area =================-->

<!--================ Start Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_content text-center">
                        <p class="text-uppercase">
                            Trường trung học phổ thông chuyên Nguyễn Tất Thành
                        </p>
                        <h2 class="text-uppercase mt-4 mb-5">
                            Nơi khởi đầu của những giấc mơ!
                        </h2>
                        <div>
                            <a href="{{url('/login')}}" class="primary-btn2 mb-3 mb-sm-0">Đăng nhập</a>
                            <a href="#" class="primary-btn ml-sm-3 ml-0">Xem tiếp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<!--    /*=================== Menu JS  ====================*/    -->
<script src="{{ asset('js/js-homepage/layout/menu_animation.js')}}"></script>




