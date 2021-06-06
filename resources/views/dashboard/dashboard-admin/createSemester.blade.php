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
                <h3 class="text-themecolor m-b-0 m-t-0">Tạo mới học kì</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/sms_admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Tạo mới học kì</li>
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
                        <h3 class="font-medium m-t-30">Tạo mới học kì</h3>
                        <hr>
                        <br>
                        <form class="form-horizontal form-material" action="{{route('postNewSemester') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-12">Nhập học kì mới</label>
                                <div class="col-md-12">
                                    <input type="text"  class="form-control form-control-line" required="" name="new_semester">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                        <i class="mdi mdi-grease-pencil" style="font-size:24px">Tạo học kì mới sẽ tạo mới bảng điểm và thời khoá biểu.</i>
                        <br>
                        <i class="mdi mdi-grease-pencil" style="font-size:24px">Bạn phải cập nhật danh sách GVCN cho khoá mới.</i>
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
