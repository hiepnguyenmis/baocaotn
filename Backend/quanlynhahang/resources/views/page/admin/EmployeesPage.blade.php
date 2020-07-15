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
                        <input class="form-control mr-sm-2" name='search' type="search" placeholder="Mã hoặc tên nguyên liệu"
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
                                                            <h3 class="card-title">Thông tin cá nhân </h3>
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
                                                                            placeholder="Nguyễn"
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
                                                                            placeholder="Văn Hiệp"
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
                                                                            placeholder=" Số 6 Trần Văn Ơn, Tp.Thủ Dầu Một, T.Bình Dương"
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
                                                                                <option selected>---Chọn---</option>
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
                                                                            placeholder="vanhiep1998@gmail.com"
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
                            @foreach ( $employees as $key => $item )
                            <?php

                            $modalEditEmployees= "modal-Edit-Employees".$item->EMPLOYEES_ID;

                            $modalDetailEmployees= "modal-Detail-Employees".$item->EMPLOYEES_ID;
                            $modalDeleteEmployees= "modal-Delete-Employees".$item->EMPLOYEES_ID;
                            ?>

                            <tr>
                                <td>{{($employees->currentpage()-1) * $employees->perpage() + $key + 1}}</td>
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
                                        <form action="{{route('xoaNV',['employees_id'=> $item->EMPLOYEES_ID])}}"
                                            method="post">
                                            @csrf
                                            <div class="modal-body">
                                                Bạn có chắc chắn xác nhận nhân viên <b>{{$item->EMPLOYEES_LASTNAME}}
                                                    {{$item->EMPLOYEES_FIRSTNAME}}</b>
                                                Nhân viên sẽ nghỉ việc từ ngày?
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group date" id="datetimepicker"
                                                                    data-target-input="nearest">
                                                                    <input type="datetime-local" class="form-control "
                                                                        name="employees_endday" />

                                                                </div>
                                                                @if ($errors->has('employees_endday'))
                                                                <div style="color: red">
                                                                    {{ $errors->first('employees_endday') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary "
                                                    data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-secondary">Lưu lại</button>
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
                                                                        placeholder="Nguyễn"
                                                                        name='employees_lastname_edit'
                                                                        value="{{$item->EMPLOYEES_LASTNAME}}">
                                                                    @if ($errors->has('employees_lastname_edit'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_lastname_edit') }}
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
                                                                                name="employees_birthday_edit"
                                                                                value="{{$item->EMPLOYEES_BIRTHDAY}}" />

                                                                        </div>
                                                                        @if ($errors->has('employees_birthday_edit'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('employees_birthday_edit') }}
                                                                        </div>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                                <!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label for="phone">Số điện
                                                                        thoại:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="0905075821"
                                                                        name="employees_phone_edit"
                                                                        value="{{$item->EMPLOYEES_PHONE}}">
                                                                    @if ($errors->has('employees_phone_edit'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_phone_edit') }}
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
                                                                                name="employees_startday_edit"
                                                                                value="{{$item->EMPLOYEES_STARTDAY}}" />

                                                                        </div>
                                                                    </div>
                                                                    @if ($errors->has('employees_startday_edit'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_startday_edit') }}
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
                                                                            name="employees_gender_edit">
                                                                            <option selected='selected'
                                                                                value="{{$item->EMPLOYEES_GENDER}}">
                                                                                {{$item->EMPLOYEES_GENDER}}</option>
                                                                            <option value="Nam">Nam</option>
                                                                            <option value="Nữ">Nữ</option>
                                                                        </select>
                                                                    </div>
                                                                    @if ($errors->has('employees_gender_edit'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_gender_edit') }}
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Tên:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Văn A"
                                                                        name="employees_firstname_edit"
                                                                        value="{{$item->EMPLOYEES_FIRSTNAME}}">
                                                                    @if ($errors->has('employees_firstname_edit'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_firstname_edit') }}
                                                                    </div>
                                                                    @endif
                                                                </div>

                                                                <!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label>Địa chỉ:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Số 6 Trần Văn Ơn"
                                                                        name="employees_address_edit"
                                                                        value="{{$item->EMPLOYEES_ADDRESS}}">
                                                                    @if ($errors->has('employees_address_edit'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_address_edit') }}
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label>vị trí:</label>
                                                                    <select name='employees_position_id_edit'
                                                                        class="form-control select2 select2-danger"
                                                                        data-dropdown-css-class="select2-danger"
                                                                        style="width: 100%;">
                                                                        <option selected
                                                                            value="{{$item->positions->POSITION_ID}}">
                                                                            {{$item->positions->POSITION_NAME}}
                                                                        </option>
                                                                        @foreach ($position as $positionItem)
                                                                        <option value="{{$positionItem->POSITION_ID}}">
                                                                            {{$positionItem->POSITION_NAME}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @if ($errors->has('employees_position_id_edit'))
                                                                <div style="color: red">
                                                                    {{ $errors->first('employees_position_id_edit') }}
                                                                </div>
                                                                @endif
                                                                <div class="form-group">
                                                                    <label>Email:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter email"
                                                                        name="employees_mail_edit"
                                                                        value="{{$item->EMPLOYEES_EMAIL}}">
                                                                    @if ($errors->has('employees_mail_edit'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('employees_mail_edit') }}
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
                                                                        name="employees_image_edit"
                                                                        id='imageEmployeesEditUrl{{$loop->index}}'
                                                                        value='{{$item->EMPLOYEES_IMG}}'>
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
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary float-right"
                                                            onclick="do_save()">Lưu thông tin
                                                        </button>
                                                    </div>
                                                </div>
                                        </form>
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Thông tin tài khoản</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse"><i
                                                            class="fas fa-minus"></i></button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="remove"><i class="fas fa-remove"></i></button>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{$item->EMPLOYEES_EMAIL}}" disabled>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label>Tên tài
                                                                khoản:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{$item->EMPLOYEES_USERNAME}}" disabled>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <form
                                                        action="{{route('resetpasword',['employees_id'=>$item->EMPLOYEES_ID,'employees_no'=>$item->EMPLOYEES_NO])}}"
                                                        method="post">
                                                        @csrf
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Đặt lại mật
                                                                    khẩu:</label>
                                                                <button type="submit" id='resetpassword'
                                                                    class="form-control btn btn-primary">Đặt lại</a>
                                                            </div>

                                                            <!-- /.form-group -->
                                                        </div>
                                                    </form>

                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Đóng</button>

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
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-minus"></i></button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                    class="fas fa-remove"></i></button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mã nhân viên:</label>
                                                    <p>{{$item->EMPLOYEES_NO}}</p>
                                                </div>
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
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-minus"></i></button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                    class="fas fa-remove"></i></button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{$item->EMPLOYEES_IMG}}" alt="..." class="img-thumbnail">
                                                <!-- /.form-group -->
                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

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
                @if ( Session::has('statusEmployeesWarningPhone') )
                <div class="alert alert-warning alert-dismissible mt-2" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>{{ Session::get('statusEmployeesWarningPhone') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ( Session::has('statusEmployeesWarningEmail') )
                <div class="alert alert-warning alert-dismissible mt-2" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>{{ Session::get('statusEmployeesWarningEmail') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (Session::has('statusEmployeesSuccess'))
                <div class="alert alert-success alert-dismissible mt-2" role="alert">
                    <i class="fas fa-check-circle"></i>
                    <strong>{{ Session::get('statusEmployeesSuccess') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (Session::has('statusEmployeesError'))
                <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>{{ Session::get('statusEmployeesError') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (Session::has('statusEmployeesEditSuccess'))
                <div class="alert alert-success alert-dismissible mt-2" role="alert">
                    <i class="fas fa-check-circle"></i>
                    <strong>{{ Session::get('statusEmployeesEditSuccess') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (Session::has('statusEmployeesEditError'))
                <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>{{ Session::get('statusEmployeesEditError') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (Session::has('statusEmployeesResetSuccess'))
                <div class="alert alert-success alert-dismissible mt-2" role="alert">
                    <i class="fas fa-check-circle"></i>
                    <strong>{{ Session::get('statusEmployeesResetSuccess') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (Session::has('statusEmployeesResetError'))
                <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>{{ Session::get('statusEmployeesResetError') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (Session::has('statusEmployeesDeleteSuccess'))
                <div class="alert alert-success alert-dismissible mt-2" role="alert">
                    <i class="fas fa-check-circle"></i>
                    <strong>{{ Session::get('statusEmployeesDeleteSuccess') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (Session::has('statusEmployeesDeleteError'))
                <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>{{ Session::get('statusEmployeesDeleteError') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>Thao tác thay đổi dữ liệu thất bại vui lòng kiểm tra lại!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
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

<script src="{{asset('js/uploadfirebase.js')}}"></script>
<!-- /.content -->
</div>

@endsection
