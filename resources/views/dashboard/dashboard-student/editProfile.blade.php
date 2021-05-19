@section('title')
    Hệ thống quản lý đào tạo
@endsection
@extends('dashboard.dashboard-student.dashboard-layout.default')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Title -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Cập nhật thông tin cá nhân</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_student')}}">Home</a></li>
                    <li class="breadcrumb-item active">Cập nhật thông tin cá nhân</li>
                </ol>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Title -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material" action="editProfile" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-12">Họ và tên</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" value="{{$user->name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" class="form-control form-control-line" value="{{$user->email}}" readonly
                                   id="example-email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Số điện thoại</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$student_info->sdt}}"
                                   class="form-control form-control-line" required="" name="phone_number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Địa chỉ</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$student_info->dia_chi}}"
                                   class="form-control form-control-line" required="" name="address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Quê quán</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$student_info->que_quan}}"
                                   class="form-control form-control-line" required="" name="que_quan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Dân tộc</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$student_info->dan_toc}}"
                                   class="form-control form-control-line" required="" name="dan_toc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Tôn giáo</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$student_info->ton_giao}}"
                                   class="form-control form-control-line" required="" name="ton_giao">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Giới tinh</label>
                        <div class="col-sm-12">
                            <select class="form-control form-control-line" required="" name="sex">
                                <option>Nam</option>
                                <option>Nữ</option>
                                <option>Khác</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if (exist) {
            alert(msg);
        }
    </script>
@endsection
