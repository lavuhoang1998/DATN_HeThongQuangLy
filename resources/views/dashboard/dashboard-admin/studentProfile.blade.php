@section('title')
    Hệ thống quản lý đào tạo
@endsection
@extends('dashboard.dashboard-admin.dashboard-layout.default')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Title -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Quản lý tài khoản học sinh</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Quản lý tài khoản học sinh</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="{{ asset($student_info1->avt)}}" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10">{{$student_info->name}}</h4>
                            <h6 class="card-subtitle">MSHS: {{$student_info1->MSHS}}</h6>
                        </center>
                    </div>
                    <div><hr> </div>
                    <div class="card-body">
                        <small class="text-muted">Email </small>
                        <h6>{{$student_info->email}}</h6>
                        <small class="text-muted p-t-30 db">Số điện thoại</small>
                        <h6>{{$student_info1->sdt}}</h6>
                        <small class="text-muted p-t-30 db">Địa chỉ</small>
                        <h6>{{$student_info1->dia_chi}}</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-medium m-t-30">Thông tin học sinh</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Họ và tên</strong>
                                <br>
                                <h4>{{$student_info->name}}</h4>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Giới tính</strong>
                                <br>
                                <h4>{{$student_info1->sex}}</h4>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Ngày sinh</strong>
                                <br>
                                <h4>{{$student_info1->date_of_birth}}</h4>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Quên quán</strong>
                                <br>
                                <h4>{{$student_info1->que_quan}}</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Dân tộc</strong>
                                <br>
                                <h4>{{$student_info1->dan_toc}}</h4>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Tôn giáo</strong>
                                <br>
                                <h4>{{$student_info1->ton_giao}}</h4>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-medium m-t-30">Thông tin học tập</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Lớp</strong>
                                <br>
                                <h4>{{$class_info->class_name}}</h4>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Khoá</strong>
                                <br>
                                <h4>Tạm thời chưa có</h4>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Giáo viên chủ nhiệm</strong>
                                <br>
                                <h4>{{$teacher_info1 ->name}}</h4>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Trạng thái</strong>
                                <br>
                                @if ($user->trang_thai === 1)
                                    <h4>Học</h4>
                                @else
                                    <h4>Nghỉ học</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h3 class="font-medium m-t-30">Thông tin phụ huynh học sinh</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Họ và tên bố</strong>
                                <br>
                                <h4>{{$student_info2->father_name}}</h4>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Số điện thoại bố</strong>
                                <br>
                                <h4>{{$student_info2->father_phone_number}}</h4>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Họ và tên mẹ</strong>
                                <br>
                                <h4>{{$student_info2->mother_name}}</h4>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Số điện thoại mẹ</strong>
                                <br>
                                <h4>{{$student_info2->mother_phone_number}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
@endsection
