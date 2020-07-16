<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foods;
class IndexControllers extends Controller
{
    public function GetIndex()
    {
        $foodspecial = collect(Foods::where('foods.FOOD_STATUS', '=', 1)
            ->where('foods.FOOD_TYPE', '<>', 4)
            ->where('foods.FOOD_ISSPECIAL', '=', 1)
            ->select(
                'foods.FOOD_ID',
                'foods.FOOD_NO',
                'foods.FOOD_NAME',
                'foods.FOOD_DESCRIPTION',
                'foods.FOOD_STATUS',
                'foods.FOOD_TYPE',
                'foods.FOOD_IMG',
                'foods.FOOD_PRICE'

            )->get());

        return view('page.index.Index',['foodspecial'=>$foodspecial]);
    }
}
