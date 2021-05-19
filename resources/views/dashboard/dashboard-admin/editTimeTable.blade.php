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
