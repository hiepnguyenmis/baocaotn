@extends('layout.AdminPageLayout')
@section('master-admin')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Nhân Viên</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="trangquanly">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quản Lý Nhân Viên</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="timkiemNV" method="GET" class="form-inline">
                        <input class="form-control mr-sm-2" name='search' type="search" placeholder="Search"
                            aria-label="Search">
                    </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã nhân viên</th>
                                <th>Tên nhân viên</th>
                                <th>Chức vụ</th>
                                <th>Điện thoại</th>
                                <th>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalAddEmployees">
                                        <i class="fas fa-plus-circle"></i> Thêm mới
                                    </button>
                                </th>
                                <!-- Modal add employee-->
                                <div class="modal fade" id="modalAddEmployees" tabindex="-1" role="dialog"
                                    aria-labelledby="modalAddEmployeesCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalAddEmployeesTitle">Thêm thông tin nhân
                                                    viên</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="themdanhsachNV" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="card card-default">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Thông tin cá nhân</h3>

                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="collapse"><i
                                                                        class="fas fa-minus"></i></button>
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="remove"><i
                                                                        class="fas fa-remove"></i></button>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Họ:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter email"
                                                                            name='employees_lastname'>

                                                                    </div>
                                                                    <!-- /.form-group -->

                                                                    <div class="form-group">
                                                                        <label>Ngày
                                                                            sinh:</label>
                                                                        <div class="form-group">
                                                                            <div class="input-group date"
                                                                                id="birthdayadd"
                                                                                data-target-input="nearest">
                                                                                <input type="text"
                                                                                    class="form-control datetimepicker-input"
                                                                                    data-target="#birthdayadd"
                                                                                    name="employees_birthday" />
                                                                                <div class="input-group-append"
                                                                                    data-target="#birthdayadd"
                                                                                    data-toggle="datetimepicker">
                                                                                    <div class="input-group-text"><i
                                                                                            class="fa fa-calendar"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <script type="text/javascript">
                                                                            $(function () {
                                                                                    $('#birthdayadd').datetimepicker({
                                                                                        format: 'L'
                                                                                    });
                                                                                });
                                                                        </script>
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="phone">Số điện
                                                                            thoại:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="phone" placeholder="0905075821"
                                                                            name="employees_phone">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Ngày làm
                                                                            việc</label>
                                                                        <div class="form-group">
                                                                            <div class="input-group date"
                                                                                id="datetimepicker6"
                                                                                data-target-input="nearest">
                                                                                <input type="text"
                                                                                    class="form-control datetimepicker-input"
                                                                                    data-target="#datetimepicker6"
                                                                                    name="employees_startday" />
                                                                                <div class="input-group-append"
                                                                                    data-target="#datetimepicker6"
                                                                                    data-toggle="datetimepicker">
                                                                                    <div class="input-group-text"><i
                                                                                            class="fas fa-calendar-minus"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <script type="text/javascript">
                                                                            $(function () {
                                                                                $('#datetimepicker6').datetimepicker({
                                                                                    defaultDate: "11/1/2013",
                                                                                    disabledDates: [
                                                                                        moment("12/25/2013"),
                                                                                        new Date(2013, 11 - 1, 21),
                                                                                        "11/22/2013 00:53"
                                                                                    ]
                                                                                });
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-group">
                                                                            <label>Giới
                                                                                tính:</label>
                                                                            <select
                                                                                class="form-control select2 select2-danger"
                                                                                data-dropdown-css-class="select2-danger"
                                                                                style="width: 100%;"
                                                                                name="employees_gender">
                                                                                <option selected='selected' value="Nam">
                                                                                    Nam</option>
                                                                                <option value="Nữ">Nữ</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Tên:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter email"
                                                                            name="employees_firstname">
                                                                    </div>

                                                                    <!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label>Địa chỉ:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter email"
                                                                            name="employees_address">
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <div class="form-group">
                                                                            <label>Chức
                                                                                vụ:</label>
                                                                            <select
                                                                                class="form-control select2 select2-danger"
                                                                                data-dropdown-css-class="select2-danger"
                                                                                style="width: 100%;"
                                                                                name="employees_position_id">
                                                                                @foreach ($position as $item)
                                                                                <option value="{{$item->POSITION_ID}}">
                                                                                    {{$item->POSITION_NAME}}</option>
                                                                                @endforeach

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter email"
                                                                            name="employees_mail">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        @if ($errors->any())
                                                                        <div class="alert alert-danger">
                                                                            <ul>
                                                                                @foreach ($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                        @endif
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <!-- /.card-body -->

                                                        </div>
                                                    </div>
                                                    {{-- <div class="card card-default">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Thông tin tài khoản</h3>

                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="collapse"><i
                                                                        class="fas fa-minus"></i></button>
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="remove"><i
                                                                        class="fas fa-remove"></i></button>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label    >Email:</label>
                                                                        <input type="text" class="form-control"

                                                                            placeholder="Enter email" name="employees_mail">
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label    >Tên tài
                                                                            khoản:</label>
                                                                        <input type="text" class="form-control"

                                                                            placeholder="Enter email">
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label    >Đặt lại mật
                                                                            khẩu:</label>
                                                                        <input type="text" class="form-control"

                                                                            placeholder="Enter email">
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label    >Nhập lại mật
                                                                            khẩu:</label>
                                                                        <input type="text" class="form-control"

                                                                            placeholder="Enter email">
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                </div>

                                                            </div>
                                                            <!-- /.card-body -->
                                                        </div>
                                                    </div> --}}
                                                    <div class="card card-default">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Hình ảnh</h3>

                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="collapse"><i
                                                                        class="fas fa-minus"></i></button>
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="remove"><i
                                                                        class="fas fa-remove"></i></button>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <img src="https://via.placeholder.com/150x200"
                                                                        alt="..." class="img-thumbnail">
                                                                    <!-- /.form-group -->
                                                                </div>
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlFile1">Thêm
                                                                            ảnh</label>
                                                                        <input type="file" class="form-control-file"
                                                                            name="image">
                                                                    </div>

                                                                    <!-- /.form-group -->
                                                                </div>

                                                            </div>
                                                            <!-- /.card-body -->

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $employees as $item )
                            <?php
                            $modalEditEmployees= "modal-Edit-Employees".$item->EMPLOYEES_ID;

                            $modalDetailEmployees= "modal-Detail-Employees".$item->EMPLOYEES_ID;
                            $modalDeleteEmployees= "modal-Delete-Employees".$item->EMPLOYEES_ID;
                            ?>

                            <tr>
                                <td></td>
                                <td>{{$item->EMPLOYEES_NO}}</td>
                                <td>{{$item->EMPLOYEES_LASTNAME}} {{$item->EMPLOYEES_FIRSTNAME}}</td>
                                <td>{{$item->positions->POSITION_NAME}}</td>
                                <td>{{$item->EMPLOYEES_PHONE}}</td>
                                <td>
                                    <i class="fas fa-info-circle text-secondary mr-3" data-toggle="modal"
                                        data-target="#{{$modalDetailEmployees}}"></i>
                                    <i class="fas fa-edit text-success mr-3" data-toggle="modal"
                                        data-target="#{{$modalEditEmployees}}"></i>
                                    <!-- Button trigger modal -->
                                    <i class="fas fa-trash-alt text-danger" data-toggle="modal"
                                        data-target="#{{$modalDeleteEmployees}}">
                                    </i>
                                </td>
                            </tr>
                            <!-- Modal xóa -->
                            <div class="modal fade" id="{{$modalDeleteEmployees}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Nhân Viên nghỉ việc</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="post">
                                            <div class="modal-body">
                                                Bạn có chắc chắn xác nhận nhân viên....
                                                Nhân viên sẽ nghỉ việc từ ngày?
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group date" id="datetimepicker5"
                                                                    data-target-input="nearest">
                                                                    <input type="text"
                                                                        class="form-control datetimepicker-input"
                                                                        data-target="#datetimepicker5"
                                                                        name="employees_endday" required />
                                                                    <div class="input-group-append"
                                                                        data-target="#datetimepicker5"
                                                                        data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i
                                                                                class="fas fa-calendar-minus"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script type="text/javascript">
                                                            $(function () {
                                                                $('#datetimepicker5').datetimepicker({
                                                                    defaultDate: "11/1/2013",
                                                                    disabledDates: [
                                                                        moment("12/25/2013"),
                                                                        new Date(2013, 11 - 1, 21),
                                                                        "11/22/2013 00:53"
                                                                    ]
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary "
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-secondary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal Edit --}}
                            <div class="modal fade" id="{{$modalEditEmployees}}" tabindex="-1" role="dialog"
                                aria-labelledby="modalEditEmployeesCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditEmployeesTitle">Cập nhật thông tin nhân
                                                viên</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form
                                            action="{{ route('suadanhsachNV',['employees_id' => $item->EMPLOYEES_ID])}}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Thông tin cá nhân</h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse"><i
                                                                    class="fas fa-minus"></i></button>
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="remove"><i
                                                                    class="fas fa-remove"></i></button>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Họ:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter email"
                                                                        name='employees_lastname'
                                                                        value="{{$item->EMPLOYEES_LASTNAME}}">
                                                                </div>
                                                                <!-- /.form-group -->

                                                                <div class="form-group">
                                                                    <label>Ngày
                                                                        sinh:</label>
                                                                    <div class="form-group">
                                                                        <div class="input-group date" id="birthdayedit"
                                                                            data-target-input="nearest">
                                                                            <input type="text"
                                                                                class="form-control datetimepicker-input"
                                                                                data-target="#birthdayedit"
                                                                                name="employees_birthday"
                                                                                value="{{$item->EMPLOYEES_BIRTHDAY}}" />
                                                                            <div class="input-group-append"
                                                                                data-target="#birthdayedit"
                                                                                data-toggle="datetimepicker">
                                                                                <div class="input-group-text"><i
                                                                                        class="fa fa-calendar"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <script type="text/javascript">
                                                                        $(function () {
                                                                                $('#birthdayedit').datetimepicker({
                                                                                    format: 'L'
                                                                                });
                                                                            });
                                                                    </script>
                                                                </div>
                                                                <!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label for="phone">Số điện
                                                                        thoại:</label>
                                                                    <input type="text" class="form-control" id="phone"
                                                                        placeholder="0905075821" name="employees_phone"
                                                                        value="{{$item->EMPLOYEES_PHONE}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Ngày làm
                                                                        việc</label>
                                                                    <div class="form-group">
                                                                        <div class="input-group date"
                                                                            id="datetimepickerstartdateedit"
                                                                            data-target-input="nearest">
                                                                            <input type="text"
                                                                                class="form-control datetimepicker-input"
                                                                                data-target="#datetimepickerstartdateedit"
                                                                                name="employees_startday"
                                                                                value="{{$item->EMPLOYEES_STARTDAY}}" />
                                                                            <div class="input-group-append"
                                                                                data-target="#datetimepickerstartdateedit"
                                                                                data-toggle="datetimepicker">
                                                                                <div class="input-group-text"><i
                                                                                        class="fas fa-calendar-minus"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <script type="text/javascript">
                                                                        $(function () {
                                                                            $('#datetimepickerstartdateedit').datetimepicker({
                                                                                defaultDate: "11/1/2013",
                                                                                disabledDates: [
                                                                                    moment("12/25/2013"),
                                                                                    new Date(2013, 11 - 1, 21),
                                                                                    "11/22/2013 00:53"
                                                                                ]
                                                                            });
                                                                        });
                                                                    </script>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label>Giới tính:</label>
                                                                        <select
                                                                            class="form-control select2 select2-danger"
                                                                            data-dropdown-css-class="select2-danger"
                                                                            style="width: 100%;"
                                                                            name="employees_gender">
                                                                            <option selected='selected'
                                                                                value="{{$item->EMPLOYEES_GENDER}}">
                                                                                {{$item->EMPLOYEES_GENDER}}</option>
                                                                            <option value="Nam">Nam</option>
                                                                            <option value="Nữ">Nữ</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Tên:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter email"
                                                                        name="employees_lastname"
                                                                        value="{{$item->EMPLOYEES_LASTNAME}}">
                                                                </div>

                                                                <!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label>Địa chỉ:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter email"
                                                                        name="employees_address"
                                                                        value="{{$item->EMPLOYEES_ADDRESS}}">
                                                                </div>
                                                                <!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label>Chức
                                                                            vụ:</label>
                                                                        <select
                                                                            class="form-control select2 select2-danger"
                                                                            data-dropdown-css-class="select2-danger"
                                                                            style="width: 100%;"
                                                                            name="employees_position_id">
                                                                            <option selected="selected"
                                                                                value="{{$item->positions->POSITION_ID}}">
                                                                                {{$item->positions->POSITION_NAME}}
                                                                            </option>
                                                                            @foreach ($position as $posi)
                                                                            <option value="{{$item->POSITION_ID}}">
                                                                                {{$posi->POSITION_NAME}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter email" name="employees_mail"
                                                                        value="{{$item->EMPLOYEES_EMAIL}}">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Thông tin tài khoản</h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse"><i
                                                                    class="fas fa-minus"></i></button>
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="remove"><i
                                                                    class="fas fa-remove"></i></button>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Email:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter email"
                                                                        value="{{$item->EMPLOYEES_EMAIL}}"
                                                                        name="employees_mail" disabled>
                                                                </div>
                                                                <!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label>Tên tài
                                                                        khoản:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter email"
                                                                        value="{{$item->EMPLOYEES_USERNAME}}" disabled>
                                                                </div>
                                                                <!-- /.form-group -->
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Đặt lại mật
                                                                        khẩu:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter email"
                                                                        name="employees_password">
                                                                </div>
                                                                <!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label>Nhập lại mật
                                                                        khẩu:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter email">
                                                                </div>
                                                                <!-- /.form-group -->
                                                            </div>

                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Hình ảnh</h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse"><i
                                                                    class="fas fa-minus"></i></button>
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="remove"><i
                                                                    class="fas fa-remove"></i></button>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="uploads/{{$item->EMPLOYEES_IMG}} " alt="..."
                                                                    class="img-thumbnail">
                                                                <!-- /.form-group -->
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">Thêm
                                                                        ảnh</label>
                                                                    <input type="file" class="form-control-file"
                                                                        id="exampleFormControlFile1" name='image'>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-primary" onclick="do_save()">Lưu
                                                    lại</button>
                                                <script>
                                                    function do_save()
                                                        {
                                                            if(Math.floor(Math.random() * 2)==1)
                                                            {
                                                                console.log('success');
                                                                $('{{$modalEditEmployees}}').modal('hide');
                                                                return;
                                                            }
                                                            console.log('failure');
                                                            return false;
                                                        }
                                                </script>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="{{$modalDetailEmployees}}" tabindex="-1" role="dialog"
                                aria-labelledby="modalEditEmployeesCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditEmployeesTitle">Chi tiết thông tin nhân
                                                viên</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title">Thông tin cá nhân</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse"><i
                                                                class="fas fa-minus"></i></button>
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="remove"><i
                                                                class="fas fa-remove"></i></button>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Họ:</label>
                                                                <p>{{$item->EMPLOYEES_LASTNAME}}</p>
                                                            </div>
                                                            <!-- /.form-group -->

                                                            <div class="form-group">
                                                                <label>Ngày
                                                                    sinh:</label>
                                                                <p>{{$item->EMPLOYEES_BIRTHDAY}}</p>
                                                            </div>
                                                            <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="phone">Số điện
                                                                    thoại:</label>
                                                                <p>{{$item->EMPLOYEES_PHONE}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Ngày làm
                                                                    việc</label>

                                                                <p>{{$item->EMPLOYEES_STARTDAY}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Tên:</label>
                                                                <p>{{$item->EMPLOYEES_FIRSTNAME}}</p>
                                                            </div>

                                                            <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label>Địa chỉ:</label>
                                                                <p>{{$item->EMPLOYEES_ADDRESS}}</p>
                                                            </div>
                                                            <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label>Chức
                                                                        vụ:</label>
                                                                    <p>{{$item->positions->POSITION_NAME}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email:</label>
                                                                <p>{{$item->EMPLOYEES_EMAIL}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label>Giới
                                                                        tính:</label>
                                                                    <p>{{$item->EMPLOYEES_GENDER}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            </div>

                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title">Hình ảnh</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse"><i
                                                                class="fas fa-minus"></i></button>
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="remove"><i
                                                                class="fas fa-remove"></i></button>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img src="uploads/{{$item->EMPLOYEES_IMG}}" alt="..."
                                                                class="img-thumbnail">
                                                            <!-- /.form-group -->
                                                        </div>

                                                    </div>
                                                    <!-- /.card-body -->

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Mã nhân viên</th>
                                <th>Tên nhân viên</th>
                                <th>Chức vụ</th>
                                <th>Điện thoại</th>
                                <th></th>
                            </tr>
                        </tfoot>

                    </table>

                    <div class="d-flex justify-content-end mt-4">
                        {{$employees->links()}}
                        <?php //Hiển thị thông báo thành công?>

                    </div>
                </div>
                @if ( session('success') )
                <div class="alert alert-success alert-dismissible m-2" role="alert" id="success-alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                @endif

                <?php //Hiển thị thông báo lỗi?>
                @if ( session('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                @endif
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
@endsection
