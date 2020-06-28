@extends('layout.AdminPageLayout')
@section('master-admin')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Nguyên Liệu</h1>
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
                    <form action="timkiemNL" method="GET" class="form-inline">
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
                                <th>Mã nguyên liệu</th>
                                <th>Tên nguyên liệu</th>
                                <th>Giá nguyên liệu</th>
                                <th>Ngày thêm</th>
                                <th>Loại nguyên liệu</th>
                                <th>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalAddMaterials">
                                        <i class="fas fa-plus-circle"></i> Thêm mới
                                    </button>
                                </th>
                                <!-- Modal add employee-->
                                <div class="modal fade" id="modalAddMaterials" tabindex="-1" role="dialog"
                                    aria-labelledby="modalAddMaterialsCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalAddMaterialsTitle">Thêm thông tin
                                                    nguyên liệu
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="themDSNL" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="card card-default">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Thông tin nguyên liệu</h3>
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
                                                                        <label>Tên nguyên liệu:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Thịt heo đùi"
                                                                            name='material_name'>
                                                                        @if ($errors->has('material_name'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('material_name') }}
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Danh mục:</label>
                                                                        <select
                                                                            class="form-control select2 select2-danger"
                                                                            data-dropdown-css-class="select2-danger"
                                                                            style="width: 100%;" name="material_id"
                                                                            required>
                                                                            @foreach ($categorymaterials as $item)
                                                                            <option
                                                                                value="{{$item->CATEGORYMATERIAL_ID}}">
                                                                                {{$item->CATEGORYMATERIAL_NAME}}
                                                                            </option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                    @if ($errors->has('material_id'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('material_id') }}
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Giá mua vào:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="20000" name="material_price">
                                                                    </div>
                                                                    @if ($errors->has('material_price'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('material_price') }}
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
                                                                    <img id='imageMaterialAdd' alt="..." width="150"
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
                                                                                id="photoMateralAdd"
                                                                                onchange="previewFileMaterialAdd()">
                                                                            <label class="custom-file-label"
                                                                                for="photoMateralAdd">Choose
                                                                                file...</label>
                                                                            <div class="invalid-feedback">Example
                                                                                invalid custom file feedback</div>
                                                                        </div>
                                                                        <span class="text-danger"
                                                                            id="statusEmptyFileImgAddMaterial"></span>
                                                                        <input type="hidden" class="form-control"
                                                                            name="material_image"
                                                                            id='imageMaterialAddUrl'>
                                                                        @if ($errors->has('material_image'))
                                                                        <div style="color: red">
                                                                            {{ $errors->first('material_image') }}
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                    <button onclick='uploadImageMaterialAdd()'
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
                            @php
                            $no=1;
                            @endphp
                            @foreach ( $materials as $key=>$item )
                            <?php
                            $modalEditMaterials= "modal-Edit-Material".$item->MATERIALS_ID;

                            $modalDetailMaterials= "modal-Detail-Material".$item->MATERIALS_ID;
                            $modalDeleteMaterials= "modal-Delete-Material".$item->MATERIALS_ID;
                            ?>

                            <tr>
                                <td>{{($materials->currentpage()-1) * $materials->perpage() + $key + 1}}</td>
                                <td>{{$item->MATERIALS_NO}}</td>
                                <td>{{$item->MATERIALS_NAME}}</td>
                                <td>{{$item->MATERIALS_PRICE}}</td>
                                <td>{{$item->MATERIALS_DATE}}</td>
                                <td>{{$item->categorymaterials->CATEGORYMATERIAL_NAME}}</td>
                                <td>
                                    <i class="fas fa-info-circle text-secondary mr-3" data-toggle="modal"
                                        data-target="#{{$modalDetailMaterials}}"></i>
                                    <i class="fas fa-edit text-success mr-3" data-toggle="modal"
                                        data-target="#{{$modalEditMaterials}}"></i>
                                    <!-- Button trigger modal -->
                                    <i class="fas fa-trash-alt text-danger" data-toggle="modal"
                                        data-target="#{{$modalDeleteMaterials}}">
                                    </i>
                                </td>
                            </tr>
                            <!-- Modal xóa -->
                            <div class="modal fade" id="{{$modalDeleteMaterials}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xóa nguyên liệu</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('xoaNL',['materials_id' => $item->MATERIALS_ID])}}"
                                            method="post">
                                            @csrf
                                            <div class="modal-body">
                                                Bạn có chắc chắn xác nhận xóa <b>{{$item->MATERIALS_NAME}}</b> ?

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
                            <div class="modal fade" id="{{$modalEditMaterials}}" tabindex="-1" role="dialog"
                                aria-labelledby="modalEditMaterialsCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditMaterialsTitle">Cập nhật thông nguyên liệu</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('suaDSNL',['materials_id' => $item->MATERIALS_ID])}}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Thông tin nguyên liệu</h3>
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
                                                                    <label>Tên nguyên liệu:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Thịt heo đùi"
                                                                        name='material_name_edit'
                                                                        value="{{$item->MATERIALS_NAME}}">
                                                                    @if ($errors->has('material_name_edit'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('material_name_edit') }}
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Danh mục:</label>
                                                                    <select class="form-control select2 select2-danger"
                                                                        data-dropdown-css-class="select2-danger"
                                                                        style="width: 100%;"
                                                                        name="category_material_id_edit" required>
                                                                        <option selected='selected'
                                                                            value="{{$item->categorymaterials->CATEGORYMATERIAL_ID}}">
                                                                            {{$item->categorymaterials->CATEGORYMATERIAL_NAME}}
                                                                        </option>
                                                                        @foreach ($categorymaterials as $catematerial)
                                                                        <option
                                                                            value="{{$catematerial->CATEGORYMATERIAL_ID}}">
                                                                            {{$catematerial->CATEGORYMATERIAL_NAME}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('category_material_id_edit'))
                                                                    <div style="color: red">
                                                                        {{ $errors->first('category_material_id_edit') }}
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Giá mua vào:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="20000"
                                                                        value='{{$item->MATERIALS_PRICE}}'
                                                                        name="material_price_edit">
                                                                </div>
                                                                @if ($errors->has('material_price_edit'))
                                                                <div style="color: red">
                                                                    {{ $errors->first('material_price_edit') }}
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
                                                                <img id='imageMaterialEdit{{$loop->index}}' alt="..."
                                                                    width="150" height="200"
                                                                    src="{{$item->MATERIALS_IMG}}" class="img-fluid">
                                                                <!-- /.form-group -->
                                                            </div>
                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label>Thêm
                                                                        ảnh</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="photoMateralEdit{{$loop->index}}"
                                                                            onchange="previewFileMaterialEdit{{$loop->index}}()">
                                                                        <label class="custom-file-label"
                                                                            for="photoMateralEdit{{$loop->index}}">Chọn
                                                                            file...</label>
                                                                        <div class="invalid-feedback">Example
                                                                            invalid custom file feedback</div>
                                                                    </div>
                                                                    <span class="text-danger"
                                                                        id="statusEmptyFileImgEditMaterial{{$loop->index}}"></span>
                                                                    <input type="hidden" class="form-control"
                                                                        name="materials_image"
                                                                        id='imageMaterialEditUrl{{$loop->index}}'>
                                                                </div>
                                                                <button
                                                                    onclick='uploadImageMaterialEdit{{$loop->index}}()'
                                                                    class="btn btn-primary mt-2" type="button">Thêm
                                                                    ảnh</button>
                                                                <!-- /.form-group -->
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                    <script>
                                                        function uploadImageMaterialEdit{{$loop->index}}() {


                                                        if (document.getElementById("photoMateralEdit{{$loop->index}}").files.length != 0) {
                                                            const ref = firebase.storage().ref();

                                                            const file = document.querySelector('#photoMateralEdit{{$loop->index}}').files[0];
                                                            const name = new Date() + '-' + file.name;
                                                            const metadata = {
                                                                contentType: file.type
                                                            }

                                                            const task = ref.child(name).put(file, metadata);

                                                            task
                                                                .then(snapshot => snapshot.ref.getDownloadURL())
                                                                .then(url => {
                                                                    const image = document.querySelector('#imageMaterialEdit{{$loop->index}}');
                                                                    image.src = url;
                                                                    const textInput = document.getElementById('imageMaterialEditUrl{{$loop->index}}')
                                                                    textInput.value = url;
                                                                    document.getElementById('statusEmptyFileImgEditMaterial{{$loop->index}}').innerHTML = 'Thêm thành công'
                                                                })
                                                        } else {
                                                            document.getElementById('statusEmptyFileImgEditMaterial{{$loop->index}}').innerHTML = "Chưa chọn ảnh"
                                                        }
                                                        }

                                                        function previewFileMaterialEdit{{$loop->index}}() {
                                                        var preview = document.querySelector('#imageMaterialEdit{{$loop->index}}');
                                                        var file = document.querySelector('#photoMateralEdit{{$loop->index}}').files[0];

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
                            <div class="modal fade" id="{{$modalDetailMaterials}}" tabindex="-1" role="dialog"
                                aria-labelledby="modalEditMaterialsCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditMaterialsTitle">Chi tiết thông tin nguyên liệu</h5>
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
                                                                <p>{{$item->MATERIALS_NO}}</p>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tên nguyên liệu:</label>
                                                                <p>{{$item->MATERIALS_NAME}}</p>

                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Danh mục:</label>
                                                                <p>{{$item->categorymaterials->CATEGORYMATERIAL_NAME}}
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Giá mua vào:</label>
                                                                <p>{{$item->MATERIALS_PRICE}}</p>
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
                                                            <img src="{{$item->MATERIALS_IMG}}" alt="..."
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
                                                data-dismiss="modal">Đóng</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Mã nguyên liệu</th>
                                <th>Tên nguyên liệu</th>
                                <th>Giá nguyên liệu</th>
                                <th>Ngày thêm</th>
                                <th>Loại nguyên liệu</th>
                                <th></th>
                            </tr>
                        </tfoot>

                    </table>
                    @if ( Session::has('statusMaterialWarning') )
                    <div class="alert alert-warning alert-dismissible mt-2" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>{{ Session::get('statusMaterialWarning') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('statusMaterialSuccess'))
                    <div class="alert alert-success alert-dismissible mt-2" role="alert">
                        <i class="fas fa-check-circle"></i> <strong>{{ Session::get('statusMaterialSuccess') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('statusMaterialError'))
                    <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>{{ Session::get('statusMaterialError') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('statusMaterialEditSuccess'))
                    <div class="alert alert-success alert-dismissible mt-2" role="alert">
                        <i class="fas fa-check-circle"></i>
                        <strong>{{ Session::get('statusMaterialEditSuccess') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('statusMaterialEditError'))
                    <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>{{ Session::get('statusMaterialEditError') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('statusMaterialDestroySuccess'))
                    <div class="alert alert-success alert-dismissible mt-2" role="alert">
                        <i class="fas fa-check-circle"></i>
                        <strong>{{ Session::get('statusMaterialDestroySuccess') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('statusMaterialDestroyError'))
                    <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>{{ Session::get('statusMaterialDestroyError') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="d-flex justify-content-end mt-4">
                        {{$materials->links()}}
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
