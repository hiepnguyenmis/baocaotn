@extends('layout.AdminPageLayout')
@section('master-admin')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Món Ăn</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="trangquanly">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quản lý ,ón ăn</li>
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
                    <form action="timkiemthucdon" method="GET" class="form-inline">
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
                                <th>Mã món ăn</th>
                                <th>Tên món ăn</th>
                                <th>Giá món ăn</th>
                                <th>Đơn vị</th>
                                <th>Ngày thêm</th>
                                <th>Loại món ăn</th>
                                <th>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalAddFoods">
                                        <i class="fas fa-plus-circle"></i> Thêm mới
                                    </button>
                                </th>
                                <!-- Modal add employee-->
                                <div class="modal fade" id="modalAddFoods" tabindex="-1" role="dialog"
                                    aria-labelledby="modalAddFoodsCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalAddFoodsTitle">Thêm thông tin
                                                    món ăn</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="themTD" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="card card-default">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Thông tin món ăn</h3>
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
                                                                        <label>Tên món ăn:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Thịt heo đùi" name='food_name'>
                                                                        @if ($errors->has('food_name'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('food_name') }}
                                                                        </div>
                                                                        @endif

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Danh mục:</label>
                                                                        <select
                                                                            class="form-control select2 select2-danger"
                                                                            data-dropdown-css-class="select2-danger"
                                                                            style="width: 100%;"
                                                                            name="food_category_id">
                                                                            <option value="" selected>---Chọn---
                                                                            </option>
                                                                            @foreach ($categoryfoods as $item)
                                                                            <option value="{{$item->CATEGORYFOODS_ID}}">
                                                                                {{$item->CATEGORYFOODS_NAME}}
                                                                            </option>
                                                                            @endforeach

                                                                        </select>
                                                                        @if ($errors->has('food_category_id'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('food_category_id') }}
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Loại:</label>
                                                                        <select
                                                                            class="form-control select2 select2-danger"
                                                                            data-dropdown-css-class="select2-danger"
                                                                            style="width: 100%;" name="food_type">
                                                                            <option value="{{$item->FOOD_TYPE}}"
                                                                                selected>---Chọn---
                                                                            </option>
                                                                            <option value="1">
                                                                                Điểm tâm
                                                                            </option>
                                                                            <option value="2">
                                                                                Bữa trưa
                                                                            </option>
                                                                            <option value="3">
                                                                                Bữa tối
                                                                            </option>
                                                                        </select>
                                                                        @if ($errors->has('food_type'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('food_type') }}
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Giá món ăn:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="20000" name="food_price">
                                                                    </div>
                                                                    @if ($errors->has('food_price'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('food_price') }}
                                                                    </div>
                                                                    @endif
                                                                    <div class="form-group">
                                                                        <label>Đơn vị:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Đĩa" name="food_unit">
                                                                    </div>
                                                                    @if ($errors->has('food_unit'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('food_unit') }}
                                                                    </div>
                                                                    @endif
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
                                                                    <img id='imageFoodsAdd' alt="..." width="150"
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
                                                                                id="photoFoodsAdd"
                                                                                onchange="previewFileFoodsAdd()">
                                                                            <label class="custom-file-label"
                                                                                for="photoFoodsAdd">Choose
                                                                                file...</label>
                                                                            <div class="invalid-feedback">Example
                                                                                invalid custom file feedback</div>
                                                                        </div>
                                                                        <span class="text-danger"
                                                                            id="statusEmptyFileImgAddFoods"></span>
                                                                        <input type="hidden" class="form-control"
                                                                            name="foods_image" id='imageFoodsAddUrl'>
                                                                        @if ($errors->has('foods_image'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('foods_image') }}
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                    <button onclick='uploadImageFoodsAdd()'
                                                                        class="btn btn-primary mt-2" type="button">Thêm
                                                                        ảnh</button>
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
                            @foreach ( $foods as $key=>$item )
                            <?php
                            $modalEditFoods= "modal-Edit-Foods".$item->FOOD_ID;

                            $modalDetailFoods= "modal-Detail-Foods".$item->FOOD_ID;
                            $modalDeleteFoods= "modal-Delete-Foods".$item->FOOD_ID;
                            ?>

                            <tr>
                                <td>{{($foods->currentpage()-1) * $foods->perpage() + $key + 1}}</td>
                                <td>{{$item->FOOD_NO}}</td>
                                <td>{{$item->FOOD_NAME}}</td>
                                <td>{{$item->FOOD_PRICE}}</td>
                                <td>{{$item->FOOD_UNIT}}</td>
                                <td>{{$item->FOOD_DATE}}</td>
                                <td>{{$item->categoryfoods->CATEGORYFOODS_NAME}}</td>
                                <td>
                                    <i class="fas fa-info-circle text-secondary mr-3" data-toggle="modal"
                                        data-target="#{{$modalDetailFoods}}"></i>
                                    <i class="fas fa-edit text-success mr-3" data-toggle="modal"
                                        data-target="#{{$modalEditFoods}}"></i>
                                    <!-- Button trigger modal -->
                                    <i class="fas fa-trash-alt text-danger" data-toggle="modal"
                                        data-target="#{{$modalDeleteFoods}}">
                                    </i>
                                </td>
                            </tr>
                            <!-- Modal xóa -->
                            <div class="modal fade" id="{{$modalDeleteFoods}}" tabindex="-1" role="dialog"
                                aria-labelledby="modalDeleteFoodsModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalDeleteFoodsModalLabel">Xóa món ăn
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('xoaTD',['foods_id' => $item->FOOD_ID])}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                Bạn có chắc chắn xác nhận xóa <b>{{$item->FOOD_NAME}}</b> ?

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary " data-dismiss="modal">Trở
                                                    lại</button>
                                                <button type="submit" class="btn btn-secondary">Lưu lại</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal Edit --}}
                            <div class="modal fade" id="{{$modalEditFoods}}" tabindex="-1" role="dialog"
                                aria-labelledby="modalEditFoodsCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditFoodsTitle">Cập nhật thông tin món ăn
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('suaTD',['foods_id' => $item->FOOD_ID])}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Thông tin món ăn</h3>
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
                                                                    <label>Tên món ăn:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Thịt heo đùi" name='food_name_edit'
                                                                        value="{{$item->FOOD_NAME}}">

                                                                </div>
                                                                @if ($errors->has('food_name_edit'))
                                                                <div style="color: red">
                                                                    {{ $errors->first('food_name_edit') }}
                                                                </div>
                                                                @endif
                                                                <div class="form-group">
                                                                    <label>Danh mục:</label>
                                                                    <select class="form-control select2 select2-danger"
                                                                        data-dropdown-css-class="select2-danger"
                                                                        style="width: 100%;"
                                                                        name="food_category_id_edit">
                                                                        <option selected='selected'
                                                                            value="{{$item->categoryfoods->CATEGORYFOODS_ID}}">
                                                                            {{$item->categoryfoods->CATEGORYFOODS_NAME}}
                                                                        </option>
                                                                        @foreach ($categoryfoods as $categoryfood)
                                                                        <option
                                                                            value="{{$categoryfood->CATEGORYFOODS_ID}}">
                                                                            {{$categoryfood->CATEGORYFOODS_NAME}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @if ($errors->has('food_category_id_edit'))
                                                                <div style="color: red">
                                                                    {{ $errors->first('food_category_id_edit') }}
                                                                </div>
                                                                @endif
                                                                <div class="form-group">
                                                                    <label>Loại:</label>
                                                                    <select class="form-control select2 select2-danger"
                                                                        data-dropdown-css-class="select2-danger"
                                                                        style="width: 100%;" name="food_type_edit">
                                                                        @if ($item->FOOD_TYPE==1)
                                                                        <option value="1" selected>
                                                                            Điểm tâm
                                                                        </option>
                                                                        @endif
                                                                        @if ($item->FOOD_TYPE==2)
                                                                        <option value="2" selected>
                                                                            Bữa trưa
                                                                        </option>
                                                                        @endif
                                                                        @if ($item->FOOD_TYPE==3)
                                                                        <option value="3" selected>
                                                                            Bữa tối
                                                                        </option>
                                                                        @endif
                                                                        @if ($item->FOOD_TYPE==3)
                                                                        <option value="" selected>
                                                                            Thức uống
                                                                        </option>
                                                                        @endif
                                                                        <option value="1">
                                                                            Điểm tâm
                                                                        </option>
                                                                        <option value="2">
                                                                            Bữa trưa
                                                                        </option>
                                                                        <option value="3">
                                                                            Bữa tối
                                                                        </option>
                                                                        <option value="4">
                                                                            Thức uống
                                                                        </option>
                                                                    </select>
                                                                    @if ($errors->has('food_type_edit'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('food_type_edit') }}
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Giá món ăn:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="20000"
                                                                        value='{{$item->FOOD_PRICE}}'
                                                                        name="food_price_edit">
                                                                </div>
                                                                @if ($errors->has('food_price_edit'))
                                                                <div style="color: red">
                                                                    {{ $errors->first('food_price_edit') }}
                                                                </div>
                                                                @endif
                                                                <div class="form-group">
                                                                    <label>Đơn vị:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="20000" value='{{$item->FOOD_UNIT}}'
                                                                        name="food_unit_edit">
                                                                </div>
                                                                @if ($errors->has('food_unit_edit'))
                                                                <div style="color: red">
                                                                    {{ $errors->first('food_unit_edit') }}
                                                                </div>
                                                                @endif
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
                                                                <img id='imageFoodsEdit{{$loop->index}}' alt="..."
                                                                    width="150" height="200" src="{{$item->FOOD_IMG}}"
                                                                    class="img-fluid">
                                                                <!-- /.form-group -->
                                                            </div>
                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label>Thêm
                                                                        ảnh</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="photoFoodsEdit{{$loop->index}}"
                                                                            onchange="previewFileFoodsEdit{{$loop->index}}()">
                                                                        <label class="custom-file-label"
                                                                            for="photoFoodsEdit{{$loop->index}}">Chọn
                                                                            file...</label>
                                                                        <div class="invalid-feedback">Example
                                                                            invalid custom file feedback</div>
                                                                    </div>
                                                                    <span class="text-danger"
                                                                        id="statusEmptyFileImgEditFoods{{$loop->index}}"></span>
                                                                    <input type="hidden" class="form-control"
                                                                        name="foods_image_edit"
                                                                        id='imageFoodsEditUrl{{$loop->index}}'" value='{{$item->FOOD_IMG}}'>

                                                                </div>
                                                                <button onclick='uploadImageFoodsEdit{{$loop->index}}()'
                                                                    class=" btn btn-primary mt-2" type="button">Thêm
                                                                    ảnh</button>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                            </div>
                                                            <!-- /.card-body -->
                                                        </div>
                                                        <script>
                                                            function uploadImageFoodsEdit{{$loop->index}}() {
                                                            if (document.getElementById("photoFoodsEdit{{$loop->index}}").files.length != 0) {
                                                                const ref = firebase.storage().ref();

                                                                const file = document.querySelector('#photoFoodsEdit{{$loop->index}}').files[0];
                                                                const name = new Date() + '-' + file.name;
                                                                const metadata = {
                                                                    contentType: file.type
                                                                }

                                                                const task = ref.child(name).put(file, metadata);

                                                                task
                                                                    .then(snapshot => snapshot.ref.getDownloadURL())
                                                                    .then(url => {
                                                                        const image = document.querySelector('#imageFoodsEdit{{$loop->index}}');
                                                                        image.src = url;
                                                                        const textInput = document.getElementById('imageFoodsEditUrl{{$loop->index}}')
                                                                        textInput.value = url;
                                                                        document.getElementById('statusEmptyFileImgEditFoods{{$loop->index}}').innerHTML = 'Thêm thành công'
                                                                    })
                                                                } else {
                                                                    document.getElementById('statusEmptyFileImgEditFoods{{$loop->index}}').innerHTML = "Chưa chọn ảnh"
                                                                }
                                                            }

                                                            function previewFileFoodsEdit{{$loop->index}}() {
                                                                var preview = document.querySelector('#imageFoodsEdit{{$loop->index}}');
                                                                var file = document.querySelector('#photoFoodsEdit{{$loop->index}}').files[0];

                                                                var reader = new FileReader();

                                                                reader.onloadend = function () {
                                                                    preview.src = reader.result;
                                                                }

                                                                if (file) {
                                                                    reader.readAsDataURL(file);
                                                                } else {
                                                                    preview.src = "https://via.placeholder.com/150x200";
                                                                }
                                                            }
                                                        </script>
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

                            <div class="modal fade" id="{{$modalDetailFoods}}" tabindex="-1" role="dialog"
                                aria-labelledby="modalEditMaterialsCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditMaterialsTitle">Chi tiết thông tin nhân
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
                                                                <label>Mã nguyên liệu:</label>
                                                                <p>{{$item->FOOD_NO}}</p>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tên nguyên liệu:</label>
                                                                <p>{{$item->FOOD_NAME}}</p>

                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Danh mục:</label>
                                                                <p>{{$item->categoryfoods->CATEGORYFOODS_NAME}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Giá mua vào:</label>
                                                                <p>{{$item->FOOD_PRICE}}</p>
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
                                                            <img src="{{$item->FOOD_IMG}}" alt="..."
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
                                <th>Mã món ăn</th>
                                <th>Tên món ăn</th>
                                <th>Giá món ăn</th>
                                <th>Đơn vị</th>
                                <th>Ngày thêm</th>
                                <th>Loại món ăn</th>
                                <th></th>
                            </tr>
                        </tfoot>

                    </table>
                    @if ( Session::has('statusFoodsWarning') )
                    <div class="alert alert-warning alert-dismissible mt-2" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>{{ Session::get('statusFoodsWarning') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('statusFoodsError'))
                    <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>{{ Session::get('statusFoodsError') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('statusFoodsAddSuccess'))
                    <div class="alert alert-success alert-dismissible mt-2" role="alert">
                        <i class="fas fa-check-circle"></i>
                        <strong>{{ Session::get('statusFoodsAddSuccess') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('statusFoodsError'))
                    <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>{{ Session::get('statusFoodsError') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('statusFoodsEditSuccess'))
                    <div class="alert alert-success alert-dismissible mt-2" role="alert">
                        <i class="fas fa-check-circle"></i>
                        <strong>{{ Session::get('statusFoodsEditSuccess') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('statusDeleteError'))
                    <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>{{ Session::get('statusDeleteError') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('statusFoodsDeleteSuccess'))
                    <div class="alert alert-success alert-dismissible mt-2" role="alert">
                        <i class="fas fa-check-circle"></i>
                        <strong>{{ Session::get('statusFoodsDeleteSuccess') }}</strong>
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

                        {{$foods->links()}}
                        <?php //Hiển thị thông báo thành công?>

                    </div>
                </div>

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
<script src="{{asset('js/uploadfirebase.js')}}"></script>
@endsection
