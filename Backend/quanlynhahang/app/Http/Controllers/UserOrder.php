<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foods;

class UserOrder extends Controller
{
    public function GetDataMenu()
    {
        $foods = collect(Foods::where('foods.FOOD_STATUS', '=', 1)
            ->where('foods.FOOD_TYPE', '<>', 4)
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
        $foodspecial=collect( Foods::where('foods.FOOD_STATUS', '=', 1)
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

        return view('page.index.Menu', ['foods' => $foods,'foodspecial'=>$foodspecial]);
    }
    public function GetCart()
    {
        return view('page.index.CartPage');
    }
}
