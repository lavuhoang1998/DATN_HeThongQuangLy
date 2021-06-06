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
                <div class="row">
                    <div class="col-md-3">
                        <h2>BẢNG ĐIỂM HỌC SINH</h2>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control form-control-line" name="class_name" onchange="location = this.value;">
                            <option value="" selected disabled hidden>Chọn học kì</option>
                            @foreach($semesters as $semester)
                                <option
                                    value="{{route('showPointBySemester', ['semester_id'=>$semester->id])}}">{{$semester->semester_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <hr>
                    <h3 class="text-right">Điểm tổng kết:</h3>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
@endsection

