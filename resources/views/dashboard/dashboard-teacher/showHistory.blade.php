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
                <h3 class="text-themecolor m-b-0 m-t-0">Đánh giá chi tiết buổi học</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_teacher')}}">Home</a></li>
                    <li class="breadcrumb-item active">Đánh giá chi tiết buổi học</li>
                </ol>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Title -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material"
                              action="{{route('getHistoryByDay')}}" method="GET">
                            <div class="form-group">
                                <label class="col-md-12">Chọn ngày dạy:</label>
                                <hr>
                                <div class="col-md-12">
                                    <input class="form-control" type="date" name="day">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 b-r">
                                        <button class="btn btn-success">Tìm kiếm</button>
                                    </div>
                                    <div class="col-md-6 b-r">
                                        <a href="{{ url('sms_teacher/allHistory') }}" type="button"
                                           class="btn btn-info">Lịch sử</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h1>LỊCH PHÂN CÔNG GIẢNG DẠY</h1>
                        <br>
                        <div class="table-responsive">
                            <table class="table color-table inverse-table">
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
                                        <td>{{$teach->subject_name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
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
