<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productt;
use Cart;

class CartController extends Controller {

    public function index(Request $request) {
        $productsByID = Productt::find($request->product_id);
        Cart::add([
            'id' => $productsByID->id,
            'name' => $productsByID->product_name,
            'qty' => $request->product_quantity,
            'price' => $productsByID->product_price,
        ]);
        return redirect('show-cart');
    }
    
    public function showCart(){
        $cartProducts=Cart::content();
        return view('frontEnd.cart.showCartContent',['cartProducts'=>$cartProducts]);
    }
    
    public function deleteCart($rowId){
      Cart::remove($rowId);  
      return redirect('show-cart');
    }
    
    public function updateQuantity(Request $request){
        Cart::update($request->rowId, $request->product_quantity);
        return redirect('show-cart')->with('message','Update Sucessfully');
    }
}
