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
                'foods.FOOD_PRICE',
                

            )->get());
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

        return view('page.index.Menu', ['foods' => $foods, 'foodspecial' => $foodspecial]);
    }
    public function AddToCart($id_food)
    {
        $foods = Foods::find($id_food);
        if (!$foods) {

            abort(404);
        }
        $cart = session()->get('cart');
        if (!$cart) {

            $cart = [
                $id_food => [
                    "FOOD_ID" => $foods->FOOD_ID,
                    "FOOD_NAME" => $foods->FOOD_NAME,
                    "QUANTITY" => 1,
                    "FOOD_PRICE" => $foods->FOOD_PRICE,
                    "FOOD_IMG" => $foods->FOOD_IMG
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back();
        }

        if (isset($cart[$id_food])) {

            $cart[$id_food]['QUANTITY']++;

            session()->put('cart', $cart);

            return redirect()->back();
        }

        $cart[$id_food] = [
            "FOOD_ID" => $foods->FOOD_ID,
            "FOOD_NAME" => $foods->FOOD_NAME,
            "QUANTITY" => 1,
            "FOOD_PRICE" => $foods->FOOD_PRICE,
            "FOOD_IMG" => $foods->FOOD_IMG
        ];

        session()->put('cart', $cart);

        return redirect()->back();
    }
    public function GetCart()
    {

        return view('page.index.CartPage');
    }

    public function UpadateCart(Request $request,$id_session)
    {


        if ($id_session && $request->quantity) {
            $cart = session()->get('cart');

            $cart[$id_session]["QUANTITY"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');

        }
        return redirect()->back();
    }

    public function RemoveCart($id_session)
    {
        if ($id_session) {

            $cart = session()->get('cart');

            if (isset($cart[$id_session])) {

                unset($cart[$id_session]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
        return redirect()->back();
    }
}
