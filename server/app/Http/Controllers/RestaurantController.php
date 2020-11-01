<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->name;
        $category =$request->category;
        
        $query = Restaurant::query();
        // sqlを付け足しているような感じ
         if($name) {
             $query->where('name', 'like', '%' . $name . '%');
         }
         if($category) {
            //  $query->where('category', 'like', '%' . $category . '%');
            $query->whereHas('category', function($q) use ($category){
                $q->where('name', 'like', '%' . $category . '%');
            });

         }
         $restaurants = $query->simplepaginate(5);
        //  simpleだと前へとかの表記になる
        $restaurants->appends(compact('name', 'category'));

         return view('restaurants.index', compact('restaurants'));



        // // 検索方法1(拡張性がない)
        // if (!empty($name)) {
        //     $restaurants = Restaurant::where('name', 'like', '%' . $name . '%');
        //     // 検索する条件や場所の指定    likeは曖昧検索などに使われる(%と組み合わせる)
        //     // nameカラムからnameが含まれている値をこれで検索できる
        // } else {
        //     $restaurants = Restaurant::all();
        // } 
        // nameが空だった場合は全件検索になる

        // $restaurants=Restaurant::simplepaginate(10);
        $restaurants = DB::table('restaurants')
        ->orderByRaw('recommend IS NULL ASC')
        ->orderBy('recommend', 'ASC')
        ->get();
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
