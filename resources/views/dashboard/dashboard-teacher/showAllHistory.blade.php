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
                <h3 class="text-themecolor m-b-0 m-t-0">Lịch sử đánh giá giờ học</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_teacher')}}">Home</a></li>
                    <li class="breadcrumb-item active">Lịch sử đánh giá giờ học</li>
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
                    <div class="col-md-6">
                        <h3 class="font-medium m-t-30">Chi tiết lịch sử đánh giá giờ học</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ url('sms_teacher/history') }}" type="button"
                           class="btn btn-info">Quay lại</a>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table color-table inverse-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Ngày</th>
                            <th>Thứ</th>
                            <th>Tiết</th>
                            <th>Lớp</th>
                            <th>Môn</th>
                            <th>Đánh giá của giáo viên</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($histories as $history)
                            <tr>
                                <td style="visibility: hidden">{{$history->id}}</td>
                                <td>{{date("d-m-Y", strtotime($history->date))}}</td>
                                <td>{{$history->day}}</td>
                                <td>{{$history->shift}}</td>
                                <td>{{$history->class_name}}</td>
                                <td>{{ucfirst($history->subject_name)}}</td>
                                <td>{{$history->content}}</td>
                                <td>
                                    <a href="{{ url('sms_teacher/history',['date'=>$history->date,'shift'=>$history->shift]) }}" type="button" class="btn btn-info">Sửa</a>
                                    <a href="{{ url('sms_teacher/allHistory',$history->id) }}" type="button" class="btn btn-danger">Xoá</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
            if(exist){
                alert(msg);
            }
        </script>
@endsection
