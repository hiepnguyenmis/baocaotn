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
        $foods = Foods::with('Materials','CategoryFoods')
                        ->paginate($pageSize);
        $materials=Materials::all();
        $categoryfoods=CategoryFoods::all();
        // return $foods;
        return view('page.admin.FoodsPage', ['foods' => $foods, 'categoryfoods' => $categoryfoods, 'materials' => $materials, 'pageSize' => $pageSize]);
    }

    public function AddFoods(Request $request)
    {

        $foods_no = null;
        $rand_code = (string) rand(1111, 10000);

        $get_year = Carbon::now()->year;
        $get_month = Carbon::now()->month;
        $foods_no = 'MA' . $get_year . $get_month . $rand_code;

        $this->validate($request, [
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           ]);

           $image = $request->file('image');

           $image_name = $image->getClientOriginalName();
           $destinationPath = public_path('/thumbnail');
           $resize_image = Image::make($image->getRealPath());
           $resize_image->resize(150, 150, function($constraint){
            $constraint->aspectRatio();
           })->save($destinationPath . '/' . $image_name);
           $destinationPath = public_path('/uploads');
           $image->move($destinationPath, $image_name);

        $foods = new Foods();

        $foods->FOOD_NO = $foods_no;
        $foods->FOOD_NAME = $request->food_name;
        $foods->FOOD_PRICE =$request->food_price;
        $foods->FOOD_UNIT = $request->food_unit;
        $foods->FOOD_STATUS = $request->food_status;
        $foods->FOOD_IMG = $image_name;
        $foods->CATEGORYFOODS_ID =$request->food_category_id;

        $foods->save();

        return redirect()->route('Thucdon');

    }

    public function EditFoods($foods_id, Request $request)
    {
        $foods = Foods::find($foods_id);



        $foods->FOOD_NAME = $request->food_name;
        $foods->FOOD_PRICE =$request->food_price;
        $foods->FOOD_UNIT = $request->food_unit;
        $foods->FOOD_STATUS = $request->food_status;
        $foods->FOOD_IMG = null;
        $foods->CATEGORYFOODS_ID =$request->food_category_id;

        $foods->save();

        return redirect()->route('Thucdon');

    }

    public function SearchFoods(Request $request){
        $pageSize = 4;
        $search = $request->get('search');
        $foods= Foods::where('FOOD_NO', 'LIKE', "%$search%")->orWhere('FOOD_NAME', 'LIKE', "%$search%")->with('Materials','CategoryFoods')->paginate($pageSize);
        $materials=Materials::all();
        $categoryfoods=CategoryFoods::all();
       // dd($employees);

        return view('page.admin.FoodsPage',['foods'=>$foods,'categoryfoods'=>$categoryfoods,'materials'=>$materials, 'pageSize'=>$pageSize]);
    }

    public function DeleteFoods( $foods_id, Request $request)
    {
        $foods=Foods::find($foods_id);

        $foods->delete();

        return redirect()->route('danhsachNV');

    }
}
