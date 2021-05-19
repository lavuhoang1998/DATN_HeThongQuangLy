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
                <h3 class="text-themecolor m-b-0 m-t-0">Nhập điểm</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_teacher')}}">Home</a></li>
                    <li class="breadcrumb-item active">Nhập điểm</li>
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
                        <h2>BẢNG ĐIỂM</h2>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control form-control-line" name="class_name" onchange="location = this.value;">
                            <option value="" selected disabled hidden>Chọn lớp</option>
                            @foreach($teaches as $teach)
                                <option
                                    value="{{route('showPointInputByClass', ['class_id'=>$teach->class_id])}}">{{$teach->class_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <br>
                    <table class="table color-table inverse-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Họ và tên</th>
                            <th>Điểm hệ số I</th>
                            <th>Điểm hệ số II</th>
                            <th>Điểm hệ số III</th>
                            <th>Điểm trung bình</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
@endsection
