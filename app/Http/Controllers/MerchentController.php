<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;
use App\Models\Product;
class MerchentController extends Controller
{
    public function index(){
       return view('merchent.index');
    }
    //store 
    public function storeManage(){
        $stores=Store::where('user_id',auth()->user()->id)->get();
        return view('merchent.store',compact('stores'));

    }
    public function storeCreate(Request $request){
        Store::create([
            'store_name'=>$request->name,
            'user_id'=>auth()->user()->id,
            'domain' => str_replace(' ', '-', strtolower($request->name)),
        ]);
        return redirect()->back()->with('message', 'Store created successfully!');

        
    }
    //category
    public function categoryManage(){
        $stores=Store::where('user_id',auth()->user()->id)->get();
        $categories=Category::where('user_id',auth()->user()->id)->get();
        return view('merchent.category',compact('categories','stores'));

    }
    public function categoryCreate(Request $request){
        Category::create([
            'store_id'=>$request->store_id,
            'user_id'=>auth()->user()->id,
            'category_name'=>$request->name,
            'slug' => str_replace(' ', '-', strtolower($request->name)),
        ]);
        return redirect()->back()->with('message', 'Category created successfully!');

        
    }
    public function getCategoryByStore($id){
        $categories=Category::where('store_id',$id)->get();
        return   response()->json($categories);
    }
    //product
    public function productManage(){
        $stores=Store::where('user_id',auth()->user()->id)->get();
        $products=Product::where('user_id',auth()->user()->id)->get();
        return view('merchent.product',compact('products','stores'));

    }
    public function productCreate(Request $request){
        Product::create([
            'store_id'=>$request->store_id,
            'category_id'=>$request->category_id,
            'user_id'=>auth()->user()->id,
            'title'=>$request->name,
            'price'=>$request->price,
            'slug' => str_replace(' ', '-', strtolower($request->name)),
        ]);
        return redirect()->back()->with('message', 'Product created successfully!');

        
    }
}
