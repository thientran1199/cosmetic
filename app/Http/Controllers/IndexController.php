<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    //
    public function index()
    {   
        $setting = Setting::all();
        $newCart = Session::get('cart');
        $slide = Slide::latest()->get();
        $category =  Category::where('parent_id',0)->get();
        $product = Product::latest()->take(12)->get();
        $productRecommand = Product::latest('view_count','desc')->take(6)->get();
        return view('home.home', compact('product','category','slide','productRecommand','newCart','setting'));
    }
    public function listProduct($slug,$id)
    {
        $newCart = Session::get('cart');
        $category =  Category::where('parent_id',0)->get();
        $product = Product::paginate(6);
        return view('home.product.list', compact('product','category','newCart'));
    }
    public function listProductByCategory($slug,$id)
    {
        $newCart = Session::get('cart');
        $category =  Category::where('parent_id',0)->get();
        $product = Product::where('category_id',$id)->paginate(6);
        return view('home.product.list', compact('product','category','newCart'));
    }
    public function productDetail($id)
    { 
            $newCart = Session::get('cart');
            $category =  Category::where('parent_id',0)->get();
            $pd = Product::find($id);
            $relateProducts = Product::where([['id','!=',$id],['category_id',$pd->category_id]])->get();
            return view('home.product.product_detail',compact('pd','category','relateProducts','newCart'));
    }
    
}
