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
                <h2 class="card-title">Danh sách tài khoản học sinh</h2>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('showStudentManageByName') }}" method="GET">
                        <div class="input-group">
                            <input type="search" class="form-control rounded" placeholder="Tìm kiếm học sinh" aria-label="Search"
                                   aria-describedby="search-addon" name="search"/>
                            <button type="submit"  class="btn btn-outline-secondary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-3 text-right">
                        <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal"
                                data-target="#add-student">Thêm tài khoản học sinh
                        </button>
                    </div>
                </div>
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
                                            <input type="text" class="form-control" required="" placeholder="Họ và tên"
                                                   name="new_name"></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control" required="" placeholder="Email"
                                                   name="new_email"></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control" required="" placeholder="Mật khẩu"
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
                                @if ($student->trang_thai == 1)
                                    <td>Học</td>
                                    <td>
                                        <a href="{{ route('studentProfile',['user_id'=>$student->id]) }}" type="button"
                                           class="btn btn-info mdi mdi-account-box"></a>
                                        <a href="{{ route('studentEdit',['user_id'=>$student->id]) }}" type="button"
                                           class="btn btn-primary mdi mdi-lead-pencil"></a>
                                        <a href="{{ route('deleteStudent',['user_id'=>$student->id]) }}" type="button"
                                           class="btn btn-danger mdi mdi-delete-forever"></a>
                                    </td>
                                @else
                                    <td>Nghỉ học</td>
                                    <td>
                                        <a href="{{ route('studentProfile',['user_id'=>$student->id]) }}" type="button"
                                           class="btn btn-info mdi mdi-account-box"></a>
                                        <a href="{{ route('studentEdit',['user_id'=>$student->id]) }}" type="button"
                                           class="btn btn-primary mdi mdi-lead-pencil"></a>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $students->links() !!}
                    </div>
                </div>
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
        if (exist) {
            alert(msg);
        }
    </script>
@endsection
