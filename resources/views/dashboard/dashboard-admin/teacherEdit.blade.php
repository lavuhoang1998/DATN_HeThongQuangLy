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
                <h3 class="text-themecolor m-b-0 m-t-0">Quản lý tài khoản giáo viên</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Quản lý tài khoản giáo viên</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material"
                      action="{{route('postTeacherEdit',['user_id'=>$teacher_info->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-12">ID</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$teacher_info1->id}} "
                                   class="form-control form-control-line" name="teacher_id" readOnly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Mã số giáo viên (GV + xxxx)</label>
                        <div class="col-md-12">
                            <input type="text" required="" placeholder="{{$teacher_info1->MSHS}} "
                                   class="form-control form-control-line" name="MSGV">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Họ và tên</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" required=""
                                   value="{{$teacher_info->name}}"
                                   name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Ngày sinh</label>
                        <div class="col-md-12">
                            <input class="form-control" type="date" required=""
                                   value="{{$teacher_info->date_of_birth}}" name="DoB">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" class="form-control form-control-line" required=""
                                   value="{{$teacher_info->email}}"
                                   id="example-email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Mật khẩu</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line"
                                   required="" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Ảnh đại diện (img/avt/teacher/MSGV.jpg)</label>
                        <div class="col-md-12">
                            <input type="text" required="" value="{{$teacher_info->avt}}"
                                   class="form-control form-control-line" name="avt">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Bộ môn</label>
                        <div class="col-sm-12">
                            <select class="form-control form-control-line"
                                    onmousedown="if(this.options.length>5){this.size=5;}" onchange='this.size=0;'
                                    onblur="this.size=0;" name="subject_name">
                                <option value="" selected disabled hidden>Chọn bộ môn</option>
                                <option>toán</option>
                                <option>ngữ văn</option>
                                <option>ngoại ngữ</option>
                                <option>giáo dục thể chất</option>
                                <option>lịch sử</option>
                                <option>địa lý</option>
                                <option>vật lý</option>
                                <option>hóa học</option>
                                <option>sinh học</option>
                                <option>công nghệ</option>
                                <option>tin học</option>
                                <option>sinh hoạt lớp</option>
                                <option>chào cờ</option>
                            </select>
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
        <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if (exist) {
                alert(msg);
            }
        </script>
@endsection
