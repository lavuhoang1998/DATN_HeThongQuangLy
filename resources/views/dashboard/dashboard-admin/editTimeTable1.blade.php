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
                <h3 class="text-themecolor m-b-0 m-t-0">Thời khoá biểu</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_admin')}}">Home</a></li>
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
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chọn lớp</h4>
                        <hr>
                        <h5 class="card-title">Khối 10</h5><br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '1')}}" role="button">10
                                    Toán</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '2')}}" role="button">10
                                    Lý</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '3')}}" role="button">10
                                    Hoá</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '4')}}" role="button">10
                                    Văn</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '5')}}" role="button">10
                                    Anh</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '6')}}" role="button">10
                                    Tin</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '7')}}" role="button">10
                                    K</a>
                            </div>
                        </div>
                        <hr>
                        <h5 class="card-title">Khối 11</h5><br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '8')}}" role="button">11
                                    Toán</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '9')}}" role="button">11
                                    Lý</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '10')}}" role="button">11
                                    Hoá</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '11')}}" role="button">11
                                    Văn</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '12')}}" role="button">11
                                    Anh</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '13')}}" role="button">11
                                    Tin</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '14')}}" role="button">11
                                    K</a>
                            </div>
                        </div>
                        <hr>
                        <h5 class="card-title">Khối 12</h5><br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '15')}}" role="button">12
                                    Toán</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '16')}}"
                                   role="button">12
                                    Lý</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '17')}}"
                                   role="button">12
                                    Hoá</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '18')}}"
                                   role="button">12
                                    Văn</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '19')}}"
                                   role="button">12
                                    Anh</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '20')}}"
                                   role="button">12
                                    Tin</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_id = '21')}}"
                                   role="button">12 K</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h1>THỜI KHOÁ BIỂU LỚP {{$class->class_name}}</h1>
                        <a class="btn btn-danger btn-rounded m-t-10 float-right"
                           href="{{url('sms_admin/deleteTimeTable',$class_id = $class->id)}}" role="button">Xoá thời
                            khoá biểu</a>
                        <div class="table-responsive">
                            <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list">
                                <thead>
                                <tr class="text-center">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Thứ 2</th>
                                    <th class="text-center">Thứ 3</th>
                                    <th class="text-center">Thứ 4</th>
                                    <th class="text-center">Thứ 5</th>
                                    <th class="text-center">Thứ 6</th>
                                    <th class="text-center">Thứ 7</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="2"
                                                data-shift="1">
                                            {{$t12->subject_name}}<br>{{$t12->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="3"
                                                data-shift="1">
                                            {{$t13->subject_name}}<br>{{$t13->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="4"
                                                data-shift="1">
                                            {{$t14->subject_name}}<br>{{$t14->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="5"
                                                data-shift="1">
                                            {{$t15->subject_name}}<br>{{$t15->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="6"
                                                data-shift="1">
                                            {{$t16->subject_name}}<br>{{$t16->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="7"
                                                data-shift="1">
                                            {{$t17->subject_name}}<br>{{$t17->teacher_name}}
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="2"
                                                data-shift="2">
                                            {{$t22->subject_name}}<br>{{$t22->teacher_name}}
                                            <br>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="3"
                                                data-shift="2">
                                            {{$t23->subject_name}}<br>{{$t23->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="4"
                                                data-shift="2">
                                            {{$t24->subject_name}}<br>{{$t24->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="5"
                                                data-shift="2">
                                            {{$t25->subject_name}}<br>{{$t25->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="6"
                                                data-shift="2">
                                            {{$t26->subject_name}}<br>{{$t26->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="7"
                                                data-shift="2">
                                            {{$t27->subject_name}}<br>{{$t27->teacher_name}}
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="2"
                                                data-shift="3">
                                            {{$t32->subject_name}}<br>{{$t32->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="3"
                                                data-shift="3">
                                            {{$t33->subject_name}}<br>{{$t33->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="4"
                                                data-shift="3">
                                            {{$t34->subject_name}}<br>{{$t34->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="5"
                                                data-shift="3">
                                            {{$t35->subject_name}}<br>{{$t35->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="6"
                                                data-shift="3">
                                            {{$t36->subject_name}}<br>{{$t36->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="7"
                                                data-shift="3">
                                            {{$t37->subject_name}}<br>{{$t37->teacher_name}}
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="2"
                                                data-shift="4">
                                            {{$t42->subject_name}}<br>{{$t42->teacher_name}}
                                            <br>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="3"
                                                data-shift="4">
                                            {{$t43->subject_name}}<br>{{$t43->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="4"
                                                data-shift="4">
                                            {{$t44->subject_name}}<br>{{$t44->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="5"
                                                data-shift="4">
                                            {{$t45->subject_name}}<br>{{$t45->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="6"
                                                data-shift="4">
                                            {{$t46->subject_name}}<br>{{$t46->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="7"
                                                data-shift="4">
                                            {{$t47->subject_name}}<br>{{$t47->teacher_name}}
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="2"
                                                data-shift="5">
                                            {{$t52->subject_name}}<br>{{$t52->teacher_name}}
                                            <br>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="3"
                                                data-shift="5">
                                            {{$t53->subject_name}}<br>{{$t53->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="4"
                                                data-shift="5">
                                            {{$t54->subject_name}}<br>{{$t54->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="5"
                                                data-shift="5">
                                            {{$t55->subject_name}}<br>{{$t55->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="6"
                                                data-shift="5">
                                            {{$t56->subject_name}}<br>{{$t56->teacher_name}}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="7"
                                                data-shift="5">
                                            {{$t57->subject_name}}<br>{{$t57->teacher_name}}
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN MODAL -->
        <!-- Modal Add Category -->
        <div class="modal fade none-border" id="modalAddTimeTable">
            <div class="modal-dialog">
                <form role="form" action="{{route('postTimeTableEdit',['class_id'=>$class->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Chỉnh sửa TKB</strong></h4>
                        </div>
                        <div class="modal-body">

                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Thứ</label>
                                        {{--                                        <h6 id="day"></h6>--}}
                                        <input type="text" readonly class="form-control-plaintext" id="day" name="day">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Tiết</label>
                                        {{--                                        <h6 id="shift"></h6>--}}
                                        <input type="text" readonly class="form-control-plaintext" id="shift"
                                               name="shift">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Chọn môn học</label>
                                        <select class="form-control form-white" name="subject">
                                            @foreach($subjects as $subject)
                                                <option>{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Chọn giáo viên</label>
                                        <select class="form-control form-white" name="teacher">
                                            @foreach($teachers as $teacher)
                                                <option>{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
            $("#modalAddTimeTable").on("show.bs.modal", function (e) {
                var link = $(e.relatedTarget),
                    day = link.data('day'),
                    shift = link.data('shift');
                $('#day').val(day);
                $('#shift').val(shift);
                // $("#day").html(day);
                // $("#shift").html(shift);
            });
        });
    </script>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if (exist) {
            alert(msg);
        }
    </script>

@endsection

