<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // get data for index page
    function index(Request $request){

        $category = Category::all();
        $products = Product::with('category');

        if($request->filter)
            $products = $products->whereHas('category',function ($q) use($request){
                $q->where('category_id',$request->filter);
            });

        $products = $products->paginate(12);

        return view('welcome',compact('products','category'));
    }


    // get product
    function sort(Request $request){
        $category = Category::all();

        $products = Product::with('category')->whereHas('category', function ($q) use ($request) {
            $q->where('category_id', $request->filter);
        })->get();

        return view('sort',compact('category','products'));
    }

    // sort product
    function setSort (Request $request){

        $list =$request->data;
        $category = Category::find($request->product_id);


        // convert json to array
        $lists =   json_decode($list,1);

        // remove old relation
        $category->products()->detach();

        // reAttach relation with new position
        foreach($lists as $item){
            $courses = $category->products()->attach([$item['claim_id'] =>["position"=>$item['role']]]);
        }

        return 200;
    }
}
