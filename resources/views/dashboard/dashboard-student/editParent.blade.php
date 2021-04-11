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
                <h3 class="text-themecolor m-b-0 m-t-0">Cập nhật thông tin cá nhân</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_student')}}">Home</a></li>
                    <li class="breadcrumb-item active">Cập nhật thông tin cá nhân</li>
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
                <form class="form-horizontal form-material" action="editParent" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-12">Họ và tên bố</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$parent_info->father_name}}"
                                   class="form-control form-control-line" name="father_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Số điện thoại bố</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$parent_info->father_phone_number}}"
                                   class="form-control form-control-line" name="father_phone_number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Họ và tên mẹ</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$parent_info->mother_name}}"
                                   class="form-control form-control-line" name="mother_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Số điện thoại mẹ</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$parent_info->mother_phone_number}}"
                                   class="form-control form-control-line" name="mother_phone_number">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
@endsection
