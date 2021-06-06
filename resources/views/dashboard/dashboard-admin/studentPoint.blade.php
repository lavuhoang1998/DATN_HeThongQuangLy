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
                        <center class="m-t-30"><img src="{{ asset($student_info->avt)}}" class="img-circle"
                                                    width="150"/>
                            <h4 class="card-title m-t-10">{{$student_info->name}}</h4>
                            <h6 class="card-subtitle">MSHS: {{$student_info1->MSHS}}</h6>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <small class="text-muted">Email </small>
                        <h6>{{$student_info->email}}</h6>
                        <small class="text-muted p-t-30 db">Số điện thoại</small>
                        <h6>{{$student_info->sdt}}</h6>
                        <small class="text-muted p-t-30 db">Địa chỉ</small>
                        <h6>{{$student_info->dia_chi}}</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-medium m-t-30">BẢNG ĐIỂM</h3>
                        <hr>
                        <div class="table-responsive">
                            <table class="table color-table inverse-table">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Học kì</th>
                                    <th class="text-left">Môn</th>
                                    <th>Điểm hệ số I</th>
                                    <th>Điểm hệ số II</th>
                                    <th>Điểm hệ số III</th>
                                    <th>Điểm trung bình môn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($points as $point)
                                    <tr class="text-center">
                                        <td></td>
                                        <td>{{$point->semester_name}}</td>
                                        <td class="text-left">{{ucfirst($point->name)}}</td>
                                        <td>{{$point->heso1}}</td>
                                        <td>{{$point->heso2}}</td>
                                        <td>{{$point->heso3}}</td>
                                        <td>{{$point->trungbinh}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {!! $points->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
@endsection
