<?php

namespace App\Http\Controllers;

// use App\Helper\CartHelper;

// use App\Cart as Cart;


use App\Helpers\CartHelper;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
   
    public function addCart(Request $request, $id)
    {
    
            $product = Product::find($id);
        if ($product != null) {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->add($product, $product->id);

            $request->session()->put('cart', $newCart);
        }
        return view('cart.minicart',compact('newCart'));
    }
    public function deleteCart(Request $request, $id)
    {
    
            // $product = Product::find($id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $newCart = new Cart($oldCart); 
            $newCart->deleteCart($id);
            if (Count($newCart->items) > 0) {
                $request->session()->put('cart', $newCart);
            }else{
                $request->session()->forget('cart');
            }
            
        return view('cart.minicart',compact('newCart'));
    }
    public function deleteItemCart(Request $request, $id)
    {
    
          
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $newCart = new Cart($oldCart); 
            $newCart->deleteCart($id);
            if (Count($newCart->items) > 0) {
                $request->session()->put('cart', $newCart);
            }else{
                $request->session()->forget('cart');
            }
            
        return view('cart.index',compact('newCart'));
    }
    public function listCart()
    {
        $newCart = Session::get('cart');
        $category =  Category::where('parent_id',0)->get();
        return view('cart.index',compact('newCart','category'));
     }
     public function updateCart(Request $request)
     {
        foreach($request->data as $item){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $newCart = new Cart($oldCart); 
            $newCart->updateCart($item["key"],$item["value"]);
            $request->session()->put('cart', $newCart);
            // return view('cart.index',compact('newCart'));
        }
        
        // // Cart::update();
        // ShoppingcartCart::update($request->id,$request->number);
     }

     public function pay()
     {

        $newCart = Session::get('cart');
        $category =  Category::where('parent_id',0)->get();
        return view('cart.pay',compact('newCart','category'));
     }

     public function postComplete(Request $request)
     {
        $newCart = Session::get('cart');
        // $data[] = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ], [
            'email.required' => 'vui long nhap lai',
            'email.email' => 'email ko dung',
            'name.required' => 'vui long nhap ho ten',
            'phone.required' => 'vui long nhap sdt',
            'address.required' => 'vui long nhap dia chi'
        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address  =$request->address;
        $customer->email = $request->email;
        $customer->save();
        
        $order = new Order();
        $order->id = $request->id;
        $order->user_id = Auth::user()->id;
        $order->customer_id = $customer->id;
        $order->note = $request->note;
        $order->total_price = $newCart->totalPrice;
        $order->address = $request->address;
        $order->save();

        foreach ($newCart->items as $product_id => $item) {
            if (($item['qty'] ?? 1) < 1)
                $quantity = 1;
            else
                $quantity = $item['qty'];
            $price = $item['price'] * $item['qty'];
            $order_id = $order->id;
            OrderDetail::create([
                'order_id' => $order_id,
                'product_id' => $item['item']->id,
                'price' => $price,
                'quantity' => $quantity
            ]);
        }
        session(['cart' => '']);
        return redirect()->route('success');
        // dd($customer);
        
     }

     public function success ()
    {
        dd("success");
        // return view('success');
    }
}
