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
                <h3 class="text-themecolor m-b-0 m-t-0">Thông tin lớp</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_student')}}">Home</a></li>
                    <li class="breadcrumb-item active">Thông tin lớp</li>
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
                <h3 class="font-medium m-t-30">Thông tin lớp học</h3>
                <br>
                <div class="row">
                    <div class="col-md-3 col-xs-6 b-r"></div>
                    <div class="col-md-3 col-xs-6 b-r"><strong>Lớp</strong>
                        <br>
                        <h4>{{$class_info->class_name}}</h4>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"><strong>Sĩ số</strong>
                        <br>
                        <h4>{{$si_so}}</h4>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"></div>
                </div>
                <hr>
                <strong>Giáo viên chủ nhiệm </strong>
                <br>
                <div class="table-responsive">
                    <br>
                    <table class="table color-table inverse-table">
                        <thead>
                        <tr>
                            <th>MSGV</th>
                            <th>Họ và tên</th>
                            <th>Ngày sinh</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$teacher_info->MSGV}}</td>
                            <td>{{$teacher_info1 ->name}}</td>
                            <td>{{$teacher_info->date_of_birth}}</td>
                            <td>{{$teacher_info->dia_chi}}</td>
                            <td>{{$teacher_info->sdt}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="font-medium m-t-30">Danh sách học sinh</h3>
                <br>
                <div class="table-responsive">
                    <table class="table color-table inverse-table">
                        <thead>
                        <tr>
                            <th>MSHS</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Ngày sinh</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->MSHS}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->date_of_birth}}</td>
                                <td>{{$student->dia_chi}}</td>
                                <td>{{$student->sdt}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--                     Pagination--}}
                    <div class="d-flex justify-content-center">
                        {!! $students->links() !!}
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
@endsection
