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
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div id="calendar-events" class="m-t-20">
                                    <div class="calendar-events" data-class="bg-info"><i class="fa fa-circle text-info"></i> 10 Toán</div>
                                    <div class="calendar-events" data-class="bg-success"><i class="fa fa-circle text-success"></i> 10 Văn</div>
                                    <div class="calendar-events" data-class="bg-danger"><i class="fa fa-circle text-danger"></i> 10 Anh</div>
                                    <div class="calendar-events" data-class="bg-warning"><i class="fa fa-circle text-warning"></i> 10K</div>
                                </div>
                            </div>
                        </div>
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
                                        <td>
                                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#add-new-event">
                                                Chào cờ<br>NGuyễn Văn A
                                            </button>
                                        </td>
                                        <td><button type="button" class="btn btn-outline-dark">Toán<br>NGuyễn Văn A</button></td>
                                        <td><button type="button" class="btn btn-outline-dark">Văn<br>NGuyễn Văn A</button></td>
                                        <td><button type="button" class="btn btn-outline-dark">Giáo dục thể chất<br>NGuyễn Văn A</button></td>
                                        <td><button type="button" class="btn btn-outline-dark">Toán<br>NGuyễn Văn A</button></td>
                                        <td><button type="button" class="btn btn-outline-dark">Toán<br>NGuyễn Văn A</button></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><button type="button" class="btn btn-outline-dark">Chào cờ<br>NGuyễn Văn A</button></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><button type="button" class="btn btn-outline-dark">Chào cờ<br>NGuyễn Văn A</button></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><button type="button" class="btn btn-outline-dark">Chào cờ<br>NGuyễn Văn A</button></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><button type="button" class="btn btn-outline-dark">Chào cờ<br>NGuyễn Văn A</button></td>
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
        <!-- BEGIN MODAL -->
        <div class="modal none-border" id="my-event">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><strong>Add Event</strong></h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Add Category -->
        <div class="modal fade none-border" id="add-new-event">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><strong>Chỉnh sửa TKB</strong></h4>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Chọn môn học</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                        <option value="success">Toán</option>
                                        <option value="danger">Ngữ văn</option>
                                        <option value="inverse">Ngoại ngữ</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Chọn giáo viên</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                        <option value="success">Nguyễn Văn A</option>
                                        <option value="danger">Nguyễn Văn B</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
@endsection
