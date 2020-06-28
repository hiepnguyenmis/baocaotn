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

use App\Foods;
use App\FoodDetail;
use App\Materials;
use App\CategoryFoods;
use Dotenv\Validator as DotenvValidator;

use DB;

class FoodsController extends Controller
{
    public function ListFoods()
    {
        $pageSize = 4;
        $foods = Foods::with('Materials', 'CategoryFoods',)
            ->orderby('foods.FOOD_ID','DESC')
            ->where('foods.FOOD_STATUS', 1)
            ->paginate($pageSize);
        $materials = Materials::all();
        $categoryfoods = CategoryFoods::all();
        // return $foods;
        return view('page.admin.FoodsPage', ['foods' => $foods, 'categoryfoods' => $categoryfoods, 'materials' => $materials, 'pageSize' => $pageSize]);
    }
    protected function isDuplicate($foods_dupli)
    {
        $foods = Foods::all();
        foreach ($foods as $item) {
            if ($item->FOOD_NAME == $foods_dupli) {
                return false;
            }
        }
        return true;
    }
    public function AddFoods(Request $request)
    {

        $foods_no = null;
        $rand_code = (string) rand(1111, 10000);

        $get_year = Carbon::now()->year;
        $get_month = Carbon::now()->month;
        $foods_no = 'MA' . $get_year . $get_month . $rand_code;
        $request->validate([
            'food_name' => 'required',
            'food_price' => 'required',
            'food_unit' => 'required',
            'foods_image' => 'required',
            'food_category_id' => 'required',
            'food_type' => 'required'

        ], [
            'food_name.required' => 'Không bỏ trống trường này',
            'food_price.required' => 'Không bỏ trống trường này',
            'food_unit.required' => 'Không bỏ trống trường này',
            'foods_image.required' => 'Không bỏ trống trường này',
            'food_category_id.required' => 'Không bỏ trống trường này',
            'food_type.required' => 'Không bỏ trống trường này'
        ]);
        $foods = new Foods();
        if ($this->isDuplicate($request->food_name)) {

            $foods->FOOD_NO = $foods_no;
            $foods->FOOD_NAME = $request->food_name;
            $foods->FOOD_PRICE = $request->food_price;
            $foods->FOOD_UNIT = $request->food_unit;
            $foods->FOOD_STATUS = 1;
            $foods->FOOD_IMG = $request->foods_image;
            $foods->FOOD_TYPE=$request->food_type;
            $foods->FOOD_DATE = Carbon::now('Asia/Ho_Chi_Minh');
            $foods->CATEGORYFOODS_ID = $request->food_category_id;

            $foods->save();

            if ($foods) {
                $success = 'Thêm mới thành công';
                Session::flash('statusFoodsAddSuccess', $success);
            } else {
                $error = 'Thêm mới thất bại';
                Session::flash('statusFoodsError', $error);
            }
            return redirect()->route('Thucdon');
        } else {
            $errorDuplicateFoodsName = 'Trùng tên món ăn';
            Session::flash('statusFoodsWarning', $errorDuplicateFoodsName);
        }

        return redirect()->route('Thucdon');
    }

    public function EditFoods($foods_id, Request $request)
    {
        $request->validate([
            'food_name_edit' => 'required',
            'food_price_edit' => 'required',
            'food_unit_edit' => 'required',
            'foods_image_edit' => 'required',
            'food_category_id_edit' => 'required',
            'food_type_edit' => 'required'

        ], [
            'food_name_edit.required' => 'Không bỏ trống trường này',
            'food_price_edit.required' => 'Không bỏ trống trường này',
            'food_unit_edit.required' => 'Không bỏ trống trường này',
            'foods_image_edit.required' => 'Không bỏ trống trường này',
            'food_category_id_edit.required' => 'Không bỏ trống trường này',
            'food_type_edit.required' => 'Không bỏ trống trường này'

        ]);
        $foods = Foods::find($foods_id);


        $foods->FOOD_NAME = $request->food_name_edit;
        $foods->FOOD_PRICE = $request->food_price_edit;
        $foods->FOOD_UNIT = $request->food_unit_edit;
        $foods->FOOD_STATUS = 1;
        $foods->FOOD_IMG = $request->foods_image_edit;
        $foods->FOOD_TYPE=$request->food_type_edit;
        $foods->FOOD_DATE = Carbon::now('Asia/Ho_Chi_Minh');
        $foods->CATEGORYFOODS_ID = $request->food_category_id_edit;
        // dd($request->food_name_edit ,$request->food_price_edit,$request->foods_image_edit,$request->food_category_id_edit);

        $foods->save( );
        if ($foods) {
            $success = 'Thay đổi thành công';
            Session::flash('statusFoodsEditSuccess', $success);
        } else {
            $error = 'Thay đổi thất bại';
            Session::flash('statusEditError', $error);
        }
        return redirect()->route('Thucdon');
    }

    public function SearchFoods(Request $request)
    {
        $pageSize = 4;
        $search = $request->get('search');
        $foods = Foods::where('FOOD_NO', 'LIKE', "%$search%")->orWhere('FOOD_NAME', 'LIKE', "%$search%")->with('Materials', 'CategoryFoods')->paginate($pageSize);
        $materials = Materials::all();
        $categoryfoods = CategoryFoods::all();

        return view('page.admin.FoodsPage', ['foods' => $foods, 'categoryfoods' => $categoryfoods, 'materials' => $materials, 'pageSize' => $pageSize]);
    }

    public function DeleteFoods($foods_id, Request $request)
    {
        $foods = Foods::find($foods_id);
        $foods->FOOD_STATUS = 0;
        $foods->save();
        if ($foods) {
            $success = 'Xóa thành công';
            Session::flash('statusFoodsDeleteSuccess', $success);
        } else {
            $error = 'Xóa thất bại';
            Session::flash('statusDeleteError', $error);
        }
        return redirect()->route('Thucdon');
    }
}
