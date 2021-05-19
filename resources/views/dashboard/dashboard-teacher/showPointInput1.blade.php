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
                    <div class="col-md-6">
                        <h2 class="font-medium m-t-30">BẢNG ĐIỂM LỚP {{$class->class_name}}</h2>
                    </div>
                    <div class="col-md-3">
                        <h2 class="font-medium m-t-30">Môn: {{$subject->name}}</h2>
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
                            <th>MSHS</th>
                            <th>Họ và tên</th>
                            <th>Điểm hệ số I</th>
                            <th>Điểm hệ số II</th>
                            <th>Điểm hệ số III</th>
                            <th>Điểm trung bình</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td></td>
                                <td>{{$student->MSHS}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->heso1}}</td>
                                <td>{{$student->heso2}}</td>
                                <td>{{$student->heso3}}</td>
                                <td>{{$student->trungbinh}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                            data-target="#modalInputPoint"
                                            data-id="{{$student->stu_id}}"
                                            data-student_name="{{$student->name}}"
                                            data-mshs="{{$student->MSHS}}"
                                            data-heso1="{{$student->heso1}}"
                                            data-heso2="{{$student->heso2}}"
                                            data-heso3="{{$student->heso3}}"
                                    >
                                        Nhập điểm
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- BEGIN MODAL -->
            <!-- Modal Add Category -->
            <div class="modal fade none-border" id="modalInputPoint">
                <div class="modal-dialog">
                    <form role="form" action="{{route('postPoint',['class_id'=>$class->id])}}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                </button>
                                <h4 class="modal-title"><strong>Nhập điểm</strong></h4>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div class="row">
                                        <div class="col-md">
                                            <input style="visibility: hidden" type="text" readonly class="form-control-plaintext" id="id" name="id">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 b-r">
                                            <label class="control-label">Họ và tên</label>
                                            <input type="text" readonly class="form-control-plaintext" id="student_name"
                                                   name="student_name">
                                        </div>
                                        <div class="col-md-6 b-r">
                                            <label class="control-label">MSHS</label>
                                            <input type="text" readonly class="form-control-plaintext"  id="mshs"
                                                   name="mshs">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md">
                                            <label class="control-label">Điểm hệ số I</label>
                                            <input type="text" class="form-control" id="heso1"  name="heso1">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md">
                                            <label class="control-label">Điểm hệ số II</label>
                                            <input type="text" class="form-control" id="heso2"  name="heso2">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md">
                                            <label class="control-label">Điểm hệ số III</label>
                                            <input type="text" class="form-control" id="heso3"  name="heso3">
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
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <script>
            $(document).ready(function () {
                $("#modalInputPoint").on("show.bs.modal", function (e) {
                    var link = $(e.relatedTarget),
                        student_name = link.data('student_name'),
                        id = link.data('id'),
                        mshs = link.data('mshs'),
                        heso1 = link.data('heso1'),
                        heso2 = link.data('heso2'),
                        heso3 = link.data('heso3');

                    $('#id').val(id);
                    $('#student_name').val(student_name);
                    $('#mshs').val(mshs);
                    $('#heso1').val(heso1);
                    $('#heso2').val(heso2);
                    $('#heso3').val(heso3);
                });
            });
        </script>
@endsection
