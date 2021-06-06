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
                                   href="{{url('sms_admin/editTimeTable',$class_name = '10 toán')}}" role="button">10
                                    toán</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '10 lý')}}" role="button">10
                                    lý</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '10 hoá')}}" role="button">10
                                    hoá</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '10 văn')}}" role="button">10
                                    văn</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '10 anh')}}" role="button">10
                                    anh</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '10 tin')}}" role="button">10
                                    tin</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '10 k')}}" role="button">10
                                    k</a>
                            </div>
                        </div>
                        <hr>
                        <h5 class="card-title">Khối 11</h5><br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '11 toán')}}" role="button">11
                                    toán</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '11 lý')}}" role="button">11
                                    lý</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '11 hoá')}}" role="button">11
                                    hoá</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '11 văn')}}" role="button">11
                                    văn</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '11 anh')}}" role="button">11
                                    anh</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '11 tin')}}" role="button">11
                                    tin</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '11 k')}}" role="button">11
                                    k</a>
                            </div>
                        </div>
                        <hr>
                        <h5 class="card-title">Khối 12</h5><br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '12 toán')}}" role="button">12
                                    toán</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '12 lý')}}"
                                   role="button">12
                                    lý</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '12 hoá')}}"
                                   role="button">12
                                    hoá</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '12 văn')}}"
                                   role="button">12
                                    văn</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '12 anh')}}"
                                   role="button">12
                                    anh</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '12 tin')}}"
                                   role="button">12
                                    tin</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-secondary"
                                   href="{{url('sms_admin/editTimeTable',$class_name = '12 k')}}"
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
                        <div class="table-responsive">
                            <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list"
                                   data-paging="true" data-paging-size="7">
                                <thead>
                                <tr>
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
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
