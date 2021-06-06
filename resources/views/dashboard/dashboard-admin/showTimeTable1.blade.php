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
                                   href="{{url('sms_admin/showTimeTable',$class_name = '10 toán')}}" role="button">10
                                    toán</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '10 lý')}}" role="button">10
                                    lý</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '10 hoá')}}" role="button">10
                                    hoá</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '10 văn')}}" role="button">10
                                    văn</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '10 anh')}}" role="button">10
                                    anh</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '10 tin')}}" role="button">10
                                    tin</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '10 k')}}" role="button">10
                                    k</a>
                            </div>
                        </div>
                        <hr>
                        <h5 class="card-title">Khối 11</h5><br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '11 toán')}}" role="button">11
                                    toán</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '11 lý')}}" role="button">11
                                    lý</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '11 hoá')}}" role="button">11
                                    hoá</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '11 văn')}}" role="button">11
                                    văn</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '11 anh')}}" role="button">11
                                    anh</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '11 tin')}}" role="button">11
                                    tin</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '11 k')}}" role="button">11
                                    k</a>
                            </div>
                        </div>
                        <hr>
                        <h5 class="card-title">Khối 12</h5><br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '12 toán')}}" role="button">12
                                    toán</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '12 lý')}}"
                                   role="button">12
                                    lý</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '12 hoá')}}"
                                   role="button">12
                                    hoá</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '12 văn')}}"
                                   role="button">12
                                    văn</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '12 anh')}}"
                                   role="button">12
                                    anh</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '12 tin')}}"
                                   role="button">12
                                    tin</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/showTimeTable',$class_name = '12 k')}}"
                                   role="button">12 k</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>THỜI KHOÁ BIỂU LỚP {{$class->class_name}} - HỌC KÌ {{$semester_chosen->semester_name}} </h2>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <select class="form-control form-control-line" name="class_name" onchange="location = this.value;">
                                    <option value="" selected disabled hidden>Chọn học kì</option>
                                    @foreach($semesters as $semester)
                                        <option
                                            value="{{route('showTimeTableBySemester', ['class_name'=>$class->class_name, 'semester_id'=>$semester->id])}}">{{$semester->semester_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if ($a ==1)
                            <a class="btn btn-dark btn-rounded m-t-10 float-right"
                               href="{{url('sms_admin/editTimeTable',$class_name = $class->class_name)}}" role="button">Chỉnh sửa</a>
                        @else
                            <a class="btn btn-dark btn-rounded m-t-10 float-right" style="visibility: hidden"
                               href="{{url('sms_admin/editTimeTable',$class_name = $class->class_name)}}" role="button">Chỉnh sửa</a>
                        @endif
                        <div class="table-responsive">
                            <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list"
                                   data-paging="true" data-paging-size="7">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Thứ 2</th>
                                    <th>Thứ 3</th>
                                    <th>Thứ 4</th>
                                    <th>Thứ 5</th>
                                    <th>Thứ 6</th>
                                    <th>Thứ 7</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="2"
                                                data-shift="1">
                                            {{$t12->subject_name}}<br>{{$t12->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="3"
                                                data-shift="1">
                                            {{$t13->subject_name}}<br>{{$t13->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="4"
                                                data-shift="1">
                                            {{$t14->subject_name}}<br>{{$t14->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="5"
                                                data-shift="1">
                                            {{$t15->subject_name}}<br>{{$t15->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="6"
                                                data-shift="1">
                                            {{$t16->subject_name}}<br>{{$t16->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="7"
                                                data-shift="1">
                                            {{$t17->subject_name}}<br>{{$t17->teacher_name}}
                                        </button>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>2</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="2"
                                                data-shift="2">
                                            {{$t22->subject_name}}<br>{{$t22->teacher_name}}
                                            <br>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="3"
                                                data-shift="2">
                                            {{$t23->subject_name}}<br>{{$t23->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="4"
                                                data-shift="2">
                                            {{$t24->subject_name}}<br>{{$t24->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="5"
                                                data-shift="2">
                                            {{$t25->subject_name}}<br>{{$t25->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="6"
                                                data-shift="2">
                                            {{$t26->subject_name}}<br>{{$t26->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="7"
                                                data-shift="2">
                                            {{$t27->subject_name}}<br>{{$t27->teacher_name}}
                                        </button>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>3</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="2"
                                                data-shift="3">
                                            {{$t32->subject_name}}<br>{{$t32->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="3"
                                                data-shift="3">
                                            {{$t33->subject_name}}<br>{{$t33->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="4"
                                                data-shift="3">
                                            {{$t34->subject_name}}<br>{{$t34->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="5"
                                                data-shift="3">
                                            {{$t35->subject_name}}<br>{{$t35->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="6"
                                                data-shift="3">
                                            {{$t36->subject_name}}<br>{{$t36->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="7"
                                                data-shift="3">
                                            {{$t37->subject_name}}<br>{{$t37->teacher_name}}
                                        </button>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>4</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="2"
                                                data-shift="4">
                                            {{$t42->subject_name}}<br>{{$t42->teacher_name}}
                                            <br>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="3"
                                                data-shift="4">
                                            {{$t43->subject_name}}<br>{{$t43->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="4"
                                                data-shift="4">
                                            {{$t44->subject_name}}<br>{{$t44->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="5"
                                                data-shift="4">
                                            {{$t45->subject_name}}<br>{{$t45->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="6"
                                                data-shift="4">
                                            {{$t46->subject_name}}<br>{{$t46->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="7"
                                                data-shift="4">
                                            {{$t47->subject_name}}<br>{{$t47->teacher_name}}
                                        </button>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>5</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="2"
                                                data-shift="5">
                                            {{$t52->subject_name}}<br>{{$t52->teacher_name}}
                                            <br>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="3"
                                                data-shift="5">
                                            {{$t53->subject_name}}<br>{{$t53->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="4"
                                                data-shift="5">
                                            {{$t54->subject_name}}<br>{{$t54->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="5"
                                                data-shift="5">
                                            {{$t55->subject_name}}<br>{{$t55->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal"
                                                data-target="#modalAddTimeTable"
                                                data-day="6"
                                                data-shift="5">
                                            {{$t56->subject_name}}<br>{{$t56->teacher_name}}
                                        </button>
                                    </td>
                                    <td>
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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>

@endsection

