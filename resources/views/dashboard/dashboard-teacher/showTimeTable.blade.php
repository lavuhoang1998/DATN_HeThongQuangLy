@section('title')
    Hệ thống quản lý đào tạo
@endsection
@extends('dashboard.dashboard-teacher.dashboard-layout.default')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Title -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Thời khoá biểu</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_teacher')}}">Home</a></li>
                    <li class="breadcrumb-item active">Thời khoá biểu</li>
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
                <h2>LỊCH PHÂN CÔNG GIẢNG DẠY KÌ {{$cur_semester->semester_name}}</h2>
                <br>
                <div class="table-responsive">
                    <table class="table color-table inverse-table" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Thứ</th>
                            <th>Tiết</th>
                            <th>Lớp</th>
                            <th>Môn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $teaches as $teach)
                            <tr>
                                <td></td>
                                <td>{{$teach->day}}</td>
                                <td>{{$teach->shift}}</td>
                                <td>{{$teach->class_name}}</td>
                                <td>{{ucfirst($teach->subject_name)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
@endsection

