<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\PaginatorIlluminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Carbon\Carbon;
use File;
use Validator;

use Session;

use App\Materials;
use App\CategoryMaterials;
use Dotenv\Validator as DotenvValidator;

use DB;
use Illuminate\Contracts\Session\Session as SessionSession;

class MaterialController extends Controller
{
    public function ListMaterials()
    {
        if (Session::has('login')) {
            $pageSize = 4;
            $materials = Materials::with('CategoryMaterials')
                ->where('materials.MATERIALS_STATUS', '=', 1)
                ->orderby('materials.MATERIALS_ID', 'DESC')
                ->paginate($pageSize);
            $categorymaterials = CategoryMaterials::all();

            return view('page.admin.MaterialsPage', ['categorymaterials' => $categorymaterials, 'materials' => $materials, 'pageSize' => $pageSize]);
        } else {
            return redirect('trangquantri/dang-nhap');
        }
    }

    protected function isDuplicate($materials_dupli)
    {
        $materials = Materials::all();
        foreach ($materials as $item) {
            if ($item->MATERIALS_NAME == $materials_dupli && $item->MATERIALS_STATUS == 1) {
                return false;
            }
        }
        return true;
    }

    public function AddMaterials(Request $request)
    {
        $request->validate([
            'material_name' => 'required',
            'material_price' => 'required',
            'material_id' => 'required',
            'material_image' => 'required'

        ], [
            'material_name.required' => 'Không bỏ trống trường này',
            'material_price.required' => 'Không bỏ trống trường này',
            'material_id.required' => 'Không bỏ trống trường này',
            'material_image.required' => 'Không bỏ trống trường này'
        ]);

        $material_no = null;
        $rand_code = (string) rand(1111, 10000);

        $get_year = Carbon::now()->year;
        $get_month = Carbon::now()->month;
        $material_no = 'NL' . $get_year . $get_month . $rand_code;

        if ($this->isDuplicate($request->material_name)) {
            $materials = new Materials();

            $materials->MATERIALS_NO = $material_no;
            $materials->MATERIALS_NAME = $request->material_name;
            $materials->MATERIALS_PRICE = $request->material_price;
            $materials->MATERIALS_IMG = $request->material_image;
            $materials->CATEGORYTYPE_ID = $request->material_id;
            $materials->MATERIALS_STATUS = 1;
            $materials->MATERIALS_DATE = Carbon::now('Asia/Ho_Chi_Minh');
            $materials->save();
            if ($materials) {
                $success = 'Thêm mới thành công';
                Session::flash('statusMaterialSuccess', $success);
            } else {
                $error = 'Thêm mới thất bại';
                Session::flash('statusMaterialError', $error);
            }
            return redirect()->route('DSNguyenLieu');
        } else {
            $errorDuplicateMaterialName = 'Trùng tên nguyên liệu';
            Session::flash('statusMaterialWarning', $errorDuplicateMaterialName);
        }
        return redirect()->route('DSNguyenLieu');
    }

    public function EditMaterials($materials_id, Request $request)
    {


        $request->validate([
            'material_name_edit' => 'required',
            'material_price_edit' => 'required',
            'category_material_id_edit' => 'required',
        ], [
            'material_name_edit.required' => 'Không bỏ trống trường này',
            'material_price_edit.required' => 'Không bỏ trống trường này',
            'category_material_id_edit.required' => 'Không bỏ trống trường này',
        ]);

        $materials = Materials::find($materials_id);
        $materials->MATERIALS_NAME = $request->material_name_edit;
        $materials->MATERIALS_PRICE = $request->material_price_edit;
        $materials->MATERIALS_DATE = Carbon::now('Asia/Ho_Chi_Minh');
        $materials->MATERIALS_IMG = $request->materials_image;
        $materials->MATERIALS_STATUS = 1;
        $materials->CATEGORYTYPE_ID = $request->category_material_id_edit;
        $materials->save();
        if ($materials) {
            $success = 'Thay đổi thành công';
            Session::flash('statusMaterialEditSuccess', $success);
        } else {
            $error = 'Thay đổi thất bại';
            Session::flash('statusMaterialEditError', $error);
        }
        return redirect()->route('DSNguyenLieu');
    }

    public function SearchMaterials(Request $request)
    {
        $pageSize = 4;
        $search = $request->get('search');
        $materials = Materials::where('MATERIALS_NO', 'LIKE', "%$search%")
            ->orWhere('MATERIALS_NAME', 'LIKE', "%$search%")
            ->with('CategoryMaterials')
            ->paginate($pageSize);

        $categorymaterials = CategoryMaterials::all();
        return view('page.admin.MaterialsPage', ['categorymaterials' => $categorymaterials, 'materials' => $materials, 'pageSize' => $pageSize]);
    }

    public function DeleteMaterials($materials_id)
    {

        try {
            $materials = Materials::find($materials_id);
            $materials->MATERIALS_STATUS = 0;
            $materials->save();
            if ($materials) {
                $success = 'Xóa thành công';
                Session::flash('statusMaterialDestroySuccess', $success);
            } else {
                $error = 'Xóa thất bại';
                Session::flash('statusMaterialDestroyError', $error);
            }
        } catch (\Throwable $th) {
            $error = 'Xóa thất bại! Nguyên liệu đang được sử dụng';
            Session::flash('statusMaterialDestroyError', $error);
        }
        return redirect()->back();
    }
}
