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
                <h3 class="text-themecolor m-b-0 m-t-0">Thông tin cá nhân</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Quản lý tài khoản giáo viên</li>
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
                <h2 class="card-title">Danh sách tài khoản giáo viên</h2>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('showTeacherManageByName') }}" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control rounded" placeholder="Tìm kiếm giáo viên" aria-label="Search"
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
                                data-target="#add-teacher">Thêm tài khoản giáo viên
                        </button>
                    </div>
                </div>
                <!-- Add Contact Popup Model -->
                <div id="add-teacher" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="form-horizontal form-material" action="teacherManager/addTeacher"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Thêm tài khoản giáo viên</h4></div>
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
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{$teacher ->id}}</td>
                                <td>{{$teacher ->name}}</td>
                                <td>{{$teacher ->email}}</td>
                                <td>{{$teacher ->password}}</td>
                                @if ($teacher->trang_thai === 1)
                                    <td>Dạy</td>
                                    <td>
                                        <a href="{{ route('teacherProfile',['user_id'=>$teacher->id]) }}" type="button"
                                           class="btn btn-info mdi mdi-account-box"></a>
                                        <a href="{{ route('teacherEdit',['user_id'=>$teacher->id]) }}" type="button"
                                           class="btn btn-primary mdi mdi-lead-pencil"></a>
                                        <a href="{{ route('deleteTeacher',['user_id'=>$teacher->id]) }}" type="button"
                                           class="btn btn-danger mdi mdi-delete-forever"></a>
                                    </td>
                                @else
                                    <td>Nghỉ việc</td>
                                    <td>
                                        <a href="{{ route('teacherProfile',['user_id'=>$teacher->id]) }}" type="button"
                                           class="btn btn-info mdi mdi-account-box"></a>
                                        <a href="{{ route('teacherEdit',['user_id'=>$teacher->id]) }}" type="button"
                                           class="btn btn-primary mdi mdi-lead-pencil"></a>
                                    </td>
                                @endif

                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $teachers->links() !!}
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
