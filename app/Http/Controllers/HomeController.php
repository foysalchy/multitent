<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Category; 
use App\Models\Product;
class HomeController extends Controller
{
  
    
    public function storeHome(){
        $store= getCurrentStore();
     
       $categories=Category::where('store_id',$store->id)->get();
        return view('index',compact('categories'));
    }
    public function archive($store,$slug){
     
        $cat=Category::where('slug',$slug)->first();
      
        $products=Product::where('category_id',$cat->id)->get();
        return view('archive',compact('products'));
    }
    
}
