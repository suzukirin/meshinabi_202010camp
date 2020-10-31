<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }
      //緑モデル名
      //compact関数？
    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        return view('restaurants.show', compact('restaurant'));
    }
}
