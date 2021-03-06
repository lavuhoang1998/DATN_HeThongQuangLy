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
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material"
                      action="{{route('postStudentEdit',['user_id'=>$student_info->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-12">ID</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$student_info1->id}} "
                                   class="form-control form-control-line" name="student_id" readOnly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Mã số học sinh (HS + xxxx)</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$student_info1->MSHS}} "
                                   class="form-control form-control-line" required="" name="MSHS">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Họ và tên</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" required=""
                                   value="{{$student_info->name}}"
                                   name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Ngày sinh</label>
                        <div class="col-md-12">
                            <input class="form-control" type="date" required=""
                                   value="{{$student_info->date_of_birth}}" name="DoB">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" class="form-control form-control-line" required=""
                                   value="{{$student_info->email}}"
                                   id="example-email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Mật khẩu</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" required=""
                                   name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Ảnh đại diện (img/avt/student/MSHS.jpg)</label>
                        <div class="col-md-12">
                            <input type="text" required="" value="{{$student_info->avt}}"
                                   class="form-control form-control-line" name="avt">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Lớp</label>
                        <div class="col-sm-12">
                            <select class="form-control form-control-line"
                                    onmousedown="if(this.options.length>7){this.size=7;}" onchange='this.size=0;'
                                    onblur="this.size=0;" required="" name="class_name">
                                <option value="" selected disabled hidden>Chọn lớp</option>
                                <option>10 toán</option>
                                <option>10 lý</option>
                                <option>10 hoá</option>
                                <option>10 văn</option>
                                <option>10 anh</option>
                                <option>10 tin</option>
                                <option>10 k</option>
                                <option>11 toán</option>
                                <option>11 lý</option>
                                <option>11 hoá</option>
                                <option>11 văn</option>
                                <option>11 anh</option>
                                <option>11 tin</option>
                                <option>11 k</option>
                                <option>12 toán</option>
                                <option>12 lý</option>
                                <option>12 hoá</option>
                                <option>12 văn</option>
                                <option>12 anh</option>
                                <option>12 tin</option>
                                <option>12 k</option>
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

