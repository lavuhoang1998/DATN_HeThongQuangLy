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
                                    <input class="form-control" type="date" name="day" value="{{$date}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Tìm kiếm</button>
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
                        <h3>Thứ {{$day}} - {{$date1}} </h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table color-table inverse-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tiết</th>
                                    <th>Lớp</th>
                                    <th>Môn</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $teaches as $teach)
                                    <tr>
                                        <td style="visibility: hidden;">{{$teach->id}}</td>
                                        <td>{{$teach->shift}}</td>
                                        <td>{{$teach->class_name}}</td>
                                        <td>{{ucfirst($teach->subject_name)}}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                    data-target="#modalAddReview"
                                                    data-id="{{$teach->id}}"
                                                    data-day="{{$day}}"
                                                    data-date="{{$date}}"
                                                    data-shift="{{$teach->shift}}"
                                                    data-class="{{$teach->class_name}}"
                                                    data-subject="{{$teach->subject_name}}"
                                            >
                                                Đánh giá
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN MODAL -->
        <!-- Modal Add Category -->
        <div class="modal fade none-border" id="modalAddReview">
            <div class="modal-dialog">
                <form role="form" action="{{route('postEditHistory')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Đánh giá chi tiết giờ học</strong></h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-3 b-r">
                                        <label class="control-label">Thứ</label>
                                        <input type="text" readonly class="form-control-plaintext" id="day" name="day">
                                    </div>
                                    <div class="col-md-3 b-r">
                                        <label class="control-label">Ngày</label>
                                        <input type="text" readonly class="form-control-plaintext" id="date" name="date">
                                    </div>
                                    <div class="col-md-3 b-r">
                                        <label class="control-label">Tiết</label>
                                        <input type="text" readonly class="form-control-plaintext" id="shift" name="shift">
                                    </div>
                                    <div class="col-md-3 b-r">
                                        <label class="control-label">Lớp</label>
                                        <input type="text" readonly class="form-control-plaintext" id="classs" name="classs">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md">
                                        <label class="control-label">Môn học</label>
                                        <input type="text" readonly class="form-control-plaintext" id="subject" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <input style="visibility: hidden" type="text" readonly class="form-control-plaintext" id="id" name="id">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md">
                                        <label class="control-label">Đánh giá của giáo viên</label>
                                        <textarea class="form-control" id ="review" name = "review" rows="5">{{$history->content}}</textarea>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button class="btn btn-success">Cập nhật</button>
                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Đóng
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END MODAL -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
    <script>
        $(document).ready(function () {
            $("#modalAddReview").on("show.bs.modal", function (e) {
                var link = $(e.relatedTarget),
                    id= link.data('id'),
                    day = link.data('day'),
                    date= link.data('date'),
                    shift = link.data('shift'),
                    classs= link.data('class'),
                    subject = link.data('subject');
                $('#id').val(id);
                $('#day').val(day);
                $('#date').val(date);
                $('#shift').val(shift);
                $('#classs').val(classs);
                $('#subject').val(subject);
            });
        });
    </script>
@endsection
