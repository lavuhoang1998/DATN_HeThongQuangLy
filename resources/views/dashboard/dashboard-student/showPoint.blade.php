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
                <h3 class="text-themecolor m-b-0 m-t-0">Tra cứu điểm</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_student')}}">Home</a></li>
                    <li class="breadcrumb-item active">Tra cứu điểm</li>
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
                <h1 class="font-medium m-t-30">BẢNG ĐIỂM HỌC SINH</h1>
                <br>
                <div class="table-responsive">
                    <table class="table color-table inverse-table">
                        <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th class="text-left">Môn học</th>
                            <th>Điểm hệ số I</th>
                            <th>Điểm hệ số II</th>
                            <th>Điểm hệ số III</th>
                            <th>Điểm trung bình môn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($points as $point)
                            <tr>
                                <td></td>
                                <td> {{$point->name}}</td>
                                <td class="text-center">{{$point->heso1}}</td>
                                <td class="text-center">{{$point->heso2}}</td>
                                <td class="text-center">{{$point->heso3}}</td>
                                <td class="text-center">{{$point->trungbinh}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <hr>
                    <h3 class="text-right">Điểm tổng kết:{{$tb}}</h3>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
@endsection

