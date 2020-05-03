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
        $pageSize = 4;
        $materials = Materials::with('CategoryMaterials')->paginate($pageSize);
        $categorymaterials = CategoryMaterials::all();

        return view('page.admin.MaterialsPage', ['categorymaterials' => $categorymaterials, 'materials' => $materials, 'pageSize' => $pageSize]);

    }

    protected function isDuplicate($materials_dupli){
        $materials=Materials::all();
        foreach($materials as $item){
            if($item->MATERIALS_NAME==$materials_dupli){
                return false;
            }

        }
        return true;
    }

    public function AddMaterials (Request $request)
    {

        $material_no = null;
        $rand_code = (string) rand(1111, 10000);

        $get_year = Carbon::now()->year;
        $get_month = Carbon::now()->month;
        $material_no = 'NL' . $get_year . $get_month . $rand_code;

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

        if($this->isDuplicate($request->material_name)){
            $materials = new Materials();

            $materials->MATERIALS_NO = $material_no;
            $materials->MATERIALS_NAME = $request->material_name;
            $materials->MATERIALS_PRICE = $materials->material_price;
            $materials->MATERIALS_IMG = $image_name;
            $materials->CATEGORYTYPE_ID = $request->material_id;
            $materials->MATERIALS_DATE= Carbon::now('Asia/Ho_Chi_Minh');

            $materials->save();

            $request->session()->flash('success', $value);
            return redirect()->route('DSNguyenLieu');

        }
        return redirect()->route('DSNguyenLieu');

    }

    public function EditMaterials($materials_id, Request $request)
    {


        $materials = Materials::find($materials_id);

        if($request->image!=null){
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName().$materials->EMPLOYEES_ID;
            if($image_name!=$materials->MATERIALS_IMG){

                $image_name = $image->getClientOriginalName();
                $destinationPath = public_path('/thumbnail');
                $resize_image = Image::make($image->getRealPath());
                $resize_image->resize(150, 150, function($constraint){
                $constraint->aspectRatio();
                })->save($destinationPath . '/' . $image_name);
                $destinationPath = public_path('/uploads');
                File::delete($destinationPath.$materials->MATERIALS_IMG);
                $image->move($destinationPath, $image_name);
            }
        }else{
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
        }
        $materials->MATERIALS_NAME = $request->material_name;
        $materials->MATERIALS_PRICE = $request->material_price;
        $materials->MATERIALS_DATE = $request->material_date;
        $materials->MATERIALS_IMG = $image_name;
        $materials->CATEGORYTYPE_ID = $request->category_id;

        $materials->save();

        return redirect()->route('DSNguyenLieu');
    }

    public function SearchMaterials(Request $request){
        $pageSize = 4;
        $search = $request->get('search');
        $materials= Materials::where('MATERIALS_NO', 'LIKE', "%$search%")
                            ->orWhere('MATERIALS_NAME', 'LIKE', "%$search%")
                            ->with('CategoryMaterials')
                            ->paginate($pageSize);

        $categorymaterials = CategoryMaterials::all();
        return view('page.admin.MaterialsPage',['categorymaterials'=>$categorymaterials,'materials'=>$materials, 'pageSize'=>$pageSize]);
    }

    public function DeleteMaterials( $materials_id)
    {
        $materials=Materials::destroy($materials_id);

        return redirect()->back();

    }
}
