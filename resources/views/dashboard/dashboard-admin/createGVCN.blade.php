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
                <h3 class="text-themecolor m-b-0 m-t-0">Chọn giáo viên chủ nhiệm</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Chọn giáo viên chủ nhiệm</li>
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
            <!-- Column -->
            <div class="col-lg-4 col-xlg-2 col-md-2">
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4 col-xlg-8 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-medium m-t-30">Chọn giáo viên chủ nhiệm</h3>
                        <hr>
                        <br>
                        <form class="form-horizontal form-material" action="{{route('postNewHomeRoomTeacher') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <h3>Khối 10</h3>
                                <div class="col-md-12">
                                    <label class="col-md-12">Lớp 10 Toán</label>
                                    <select class="form-control form-white" name="10toan" required>
                                        <option value="" selected disabled hidden></option>
                                        @foreach($teachers as $teacher)
                                            <option>{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-12">Lớp 10 Lý</label>
                                    <select class="form-control form-white" name="10ly" required>
                                        <option value="" selected disabled hidden></option>
                                        @foreach($teachers as $teacher)
                                            <option>{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-12">Lớp 10 Hoá</label>
                                    <select class="form-control form-white" name="10hoa" required>
                                        <option value="" selected disabled hidden></option>
                                        @foreach($teachers as $teacher)
                                            <option>{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-12">Lớp 10 Văn</label>
                                    <select class="form-control form-white" name="10van" required>
                                        <option value="" selected disabled hidden></option>
                                        @foreach($teachers as $teacher)
                                            <option>{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-12">Lớp 10 Anh</label>
                                    <select class="form-control form-white" name="10anh" required>
                                        <option value="" selected disabled hidden></option>
                                        @foreach($teachers as $teacher)
                                            <option>{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-12">Lớp 10 Tin</label>
                                    <select class="form-control form-white" name="10tin" required>
                                        <option value="" selected disabled hidden></option>
                                        @foreach($teachers as $teacher)
                                            <option>{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-12">Lớp 10 K</label>
                                    <select class="form-control form-white" name="10k" required>
                                        <option value="" selected disabled hidden></option>
                                        @foreach($teachers as $teacher)
                                            <option>{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xlg-2 col-md-2">
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
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
