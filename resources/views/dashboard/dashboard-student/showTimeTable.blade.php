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
                <h3 class="text-themecolor m-b-0 m-t-0">Thời khoá biểu</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_student')}}">Home</a></li>
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
        <div class="card">
            <div class="card-body">
                <h1>THỜI KHOÁ BIỂU LỚP {{$class->class_name}}</h1>
                <div class="table-responsive">
                    <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list">
                        <thead>
                        <tr>
                            <th>#</th>
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
                                <button type="button" style="padding: 10px 60px;" class="btn btn-outline-dark"
                                        data-toggle="modal"
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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
@endsection

