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
                                                                        @if ($errors->has('employees_lastname'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('employees_lastname') }}
                                                                        </div>
                                                                        @endif

                                                                    </div>
                                                                    <!-- /.form-group -->

                                                                    <div class="form-group">
                                                                        <label>Ngày
                                                                            sinh:</label>
                                                                        <div class="form-group">
                                                                            <div class="input-group date"
                                                                                id="birthdayadd"
                                                                                data-target-input="nearest">
                                                                                <input type="datetime-local"
                                                                                    class="form-control "
                                                                                    name="employees_birthday" />

                                                                            </div>
                                                                            @if ($errors->has('employees_birthday'))
                                                                            <div style="color: red">
                                                                                {{ $errors->first('employees_birthday') }}
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="phone">Số điện
                                                                            thoại:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="phone" placeholder="0905075821"
                                                                            name="employees_phone">
                                                                        @if ($errors->has('employees_phone'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('employees_phone') }}
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Ngày làm
                                                                            việc</label>
                                                                        <div class="form-group">
                                                                            <div class="input-group date"
                                                                                id="datetimepicker6"
                                                                                data-target-input="nearest">
                                                                                <input type="datetime-local"
                                                                                    class="form-control"
                                                                                    name="employees_startday" />

                                                                            </div>
                                                                        </div>
                                                                        @if ($errors->has('employees_startday'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('employees_startday') }}
                                                                        </div>
                                                                        @endif
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
                                                                        @if ($errors->has('employees_gender'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('employees_gender') }}
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Tên:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter email"
                                                                            name="employees_firstname">
                                                                        @if ($errors->has('employees_firstname'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('employees_firstname') }}
                                                                        </div>
                                                                        @endif
                                                                    </div>

                                                                    <!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label>Địa chỉ:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter email"
                                                                            name="employees_address">
                                                                        @if ($errors->has('employees_address'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('employees_address') }}
                                                                        </div>
                                                                        @endif
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
                                                                            @if ($errors->has('employees_position_id'))
                                                                            <div style="color: red">
                                                                                {{ $errors->first('employees_position_id') }}
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter email"
                                                                            name="employees_mail">
                                                                    </div>
                                                                    @if ($errors->has('employees_mail'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_mail') }}</div>
                                                                    @endif

                                                                </div>

                                                            </div>
                                                            <!-- /.card-body -->

                                                        </div>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img id='imageEmployeesAdd' alt="..." width="150"
                                                                    height="200"
                                                                    src="https://via.placeholder.com/150x200"
                                                                    class="img-fluid">
                                                                <!-- /.form-group -->
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Thêm
                                                                        ảnh</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="photoEmployeesAdd"
                                                                            onchange="previewFileEmployeesAdd()"
                                                                            required>
                                                                        <label class="custom-file-label"
                                                                            for="photoEmployeesAdd">Choose
                                                                            file...</label>
                                                                        <div class="invalid-feedback">Example
                                                                            invalid custom file feedback</div>
                                                                    </div>
                                                                    <span class="text-danger"
                                                                        id="statusEmptyFileImgAddEmployees"></span>
                                                                    <input type="hidden" class="form-control"
                                                                        placeholder="20000" name="employees_image"
                                                                        id='imageEmployeesAddUrl'>
                                                                </div>
                                                                <button onclick='uploadImageEmployeesAdd()'
                                                                    class="btn btn-primary mt-2" type="button">Thêm
                                                                    ảnh</button>
                                                                <!-- /.form-group -->
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
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
                            @php
                            $temp=1;
                            @endphp
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
                                                                <div class="input-group date" id="datetimepicker"
                                                                    data-target-input="nearest">
                                                                    <input type="datetime-local" class="form-control "
                                                                        name="employees_endday" required />

                                                                </div>
                                                            </div>
                                                        </div>

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
                                                                    @if ($errors->has('employees_lastname'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_lastname') }}
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <!-- /.form-group -->

                                                                <div class="form-group">
                                                                    <label>Ngày
                                                                        sinh:</label>
                                                                    <div class="form-group">
                                                                        <div class="input-group date" id="birthdayedit">
                                                                            <input type="datetime-local"
                                                                                class="form-control "
                                                                                data-target="#birthdayedit"
                                                                                name="employees_birthday"
                                                                                value="{{$item->EMPLOYEES_BIRTHDAY}}" />

                                                                        </div>
                                                                        @if ($errors->has('employees_birthday'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('employees_birthday') }}
                                                                        </div>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                                <!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label for="phone">Số điện
                                                                        thoại:</label>
                                                                    <input type="text" class="form-control" id="phone"
                                                                        placeholder="0905075821" name="employees_phone"
                                                                        value="{{$item->EMPLOYEES_PHONE}}">
                                                                    @if ($errors->has('employees_phone'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_phone') }}
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Ngày làm
                                                                        việc</label>
                                                                    <div class="form-group">
                                                                        <div class="input-group date"
                                                                            id="datetimepickerstartdateedit">
                                                                            <input type="datetime-local"
                                                                                class="form-control "
                                                                                name="employees_startday"
                                                                                value="{{$item->EMPLOYEES_STARTDAY}}" />

                                                                        </div>
                                                                    </div>
                                                                    @if ($errors->has('employees_startday'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_startday') }}
                                                                    </div>
                                                                    @endif

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
                                                                    @if ($errors->has('employees_gender'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_gender') }}
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Tên:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter email"
                                                                        name="employees_lastname"
                                                                        value="{{$item->EMPLOYEES_LASTNAME}}">
                                                                    @if ($errors->has('employees_lastname'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_lastname') }}
                                                                    </div>
                                                                    @endif
                                                                </div>

                                                                <!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label>Địa chỉ:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter email"
                                                                        name="employees_address"
                                                                        value="{{$item->EMPLOYEES_ADDRESS}}">
                                                                    @if ($errors->has('employees_address'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_address') }}
                                                                    </div>
                                                                    @endif
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
                                                                    @if ($errors->has('employees_position_id'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_position_id') }}
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter email" name="employees_mail"
                                                                        value="{{$item->EMPLOYEES_EMAIL}}">
                                                                    @if ($errors->has('employees_mail'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_mail') }}
                                                                    </div>
                                                                    @endif
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
                                                                <img id='imageEmployeesEdit{{$loop->index}}' alt="..."
                                                                    width="150" height="200"
                                                                    src="{{$item->EMPLOYEES_IMG}}" class="img-fluid">
                                                                <!-- /.form-group -->
                                                            </div>
                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label>Thêm
                                                                        ảnh</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="photoEmployeesEdit{{$loop->index}}"
                                                                            onchange="previewFileEmployeesEdit{{$loop->index}}()">
                                                                        <label class="custom-file-label"
                                                                            for="photoEmployeesEdit{{$loop->index}}">Chọn
                                                                            file...</label>
                                                                        <div class="invalid-feedback">Example
                                                                            invalid custom file feedback</div>
                                                                    </div>
                                                                    <span class="text-danger"
                                                                        id="statusEmptyFileImgEditEmployees{{$loop->index}}"></span>
                                                                    <input type="hidden" class="form-control"
                                                                        name="employees_image"
                                                                        id='imageEmployeesEditUrl{{$loop->index}}'>
                                                                </div>
                                                                <button
                                                                    onclick='uploadImageEmployeesEdit{{$loop->index}}()'
                                                                    class="btn btn-primary mt-2" type="button">Thêm
                                                                    ảnh</button>
                                                                <!-- /.form-group -->
                                                                <script>
                                                                    function uploadImageEmployeesEdit{{$loop->index}}() {


    if (document.getElementById("photoEmployeesEdit{{$loop->index}}").files.length != 0) {
        const ref = firebase.storage().ref();

        const file = document.querySelector('#photoEmployeesEdit{{$loop->index}}').files[0];
        const name = new Date() + '-' + file.name;
        const metadata = {
            contentType: file.type
        }

        const task = ref.child(name).put(file, metadata);

        task
            .then(snapshot => snapshot.ref.getDownloadURL())
            .then(url => {
                const image = document.querySelector('#imageEmployeesEdit{{$loop->index}}');
                image.src = url;
                const textInput = document.getElementById('imageEmployeesEditUrl{{$loop->index}}')
                textInput.value = url;
                document.getElementById('statusEmptyFileImgEditEmployees{{$loop->index}}').innerHTML = 'Thêm thành công'
            })
    } else {
        document.getElementById('statusEmptyFileImgEditEmployees{{$loop->index}}').innerHTML = "Chưa chọn ảnh"
    }
}
function previewFileEmployeesEdit{{$loop->index}}() {
    var preview = document.querySelector('#imageEmployeesEdit{{$loop->index}}');
    var file = document.querySelector('#photoEmployeesEdit{{$loop->index}}').files[0];

    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}
                                                                </script>
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
                                                            <img src="{{$item->EMPLOYEES_IMG}}" alt="..."
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

                <?php //Hiển thị thông báo lỗi?>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@if ( Session::has('error_status_employees') )
<div class="alert alert-danger alert-dismissible" role="alert">
    <strong>{{ Session::get('error_status_employees') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
</div>
@endif
<script src="{{asset('js/uploadfirebase.js')}}"></script>
<!-- /.content -->
</div>
@endsection
