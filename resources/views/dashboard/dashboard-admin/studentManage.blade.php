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
                <h3 class="text-themecolor m-b-0 m-t-0">Quản lý tài khoản học sinh</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Quản lý tài khoản học sinh</li>
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
                <h4 class="card-title">Danh sách tài khoản học sinh</h4>
                <h6 class="card-subtitle"></h6>
                <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal"
                        data-target="#add-student">Thêm tài khoản học sinh
                </button>
                <!-- Add Contact Popup Model -->
                <div id="add-student" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="form-horizontal form-material" action="studentManager/addStudent"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Thêm tài khoản học sinh</h4></div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control" placeholder="Họ và tên"
                                                   name="new_name"></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control" placeholder="Email"
                                                   name="new_email"></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control" placeholder="Mật khẩu"
                                                   name="new_password"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success">Cập nhật</button>
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Quay
                                        lại
                                    </button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </form>
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div class="table-responsive">
                    <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list"
                           data-paging="true" data-paging-size="7">
                        <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student ->id}}</td>
                                <td>{{$student ->name}}</td>
                                <td>{{$student ->email}}</td>
                                <td>{{$student ->password}}</td>
                                @if ($student->trang_thai === 1)
                                    <td>Học</td>
                                @else
                                    <h4>Nghỉ học</h4>
                                @endif
                                <td>
                                    <a href="{{ route('studentProfile',['user_id'=>$student->id]) }}" type="button" class="btn btn-info">Xem</a>
                                    <a href="{{ route('studentEdit',['user_id'=>$student->id]) }}" type="button" class="btn btn-primary">Sửa</a>
                                    <a href="{{ route('deleteStudent',['user_id'=>$student->id]) }}" type="button" class="btn btn-danger">Xoá</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
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
