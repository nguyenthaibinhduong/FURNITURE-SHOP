<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cart;
    protected $product;
    protected $cartProduct;

    public function __construct(Product $product, Cart $cart, CartProduct $cartProduct)
    {
        $this->product = $product;
        $this->cart = $cart;
        $this->cartProduct = $cartProduct;
    }
    
    public function index(){
        $cart = $this->cart->findOrCreate(auth()->user()->id);
        $cartproduct = $this->cartProduct->where('cart_id','=',$cart->id)->get();
        $subtotal = 0;
        
        foreach ($cartproduct as $cart){
            $subtotal= $subtotal+($cart->product_price*$cart->quantity);
       }
        return view('client.cart.index',compact('cartproduct','subtotal'));
    }
    public function delete($id){
        $cart = $this->cart->findOrCreate(auth()->user()->id);
        $this->cartProduct->where('cart_id','=',$cart->id)->where('product_id','=',$id)->delete();
        return redirect()->route('cart');
    }

    public function store(Request $request){
        $cart = $this->cart->findOrCreate(auth()->user()->id);
        $product = $this->product->find($request->id);
        $cartproduct = $this->cartProduct->where('cart_id', $cart->id)
        ->where('product_id', $product->id)
        ->first();
        if($cartproduct==null){
            $this->cartProduct->create([
                'user_id'=>auth()->user()->id,
                'cart_id'=>$cart->id,
                'product_id'=>$request->id,
                'product_name'=>$product->name,
                'product_price'=>$product->price,
                'product_image'=>$product->image,
                'quantity'=>$request->quantity
    
            ]);
            return redirect()->route('cart');
        }else{
            $quantity = $cartproduct->quantity + $request->quantity; 
            
            $cartproduct->update([
                'quantity'=>$quantity
            ]);
            return redirect()->route('cart');
        }
        

    }
    public function update(Request $request){
        //dd($request->all());
        $cart = $this->cart->findOrCreate(auth()->user()->id);
        $cartproduct = $this->cartProduct->where('cart_id', $cart->id);
        $count = count($request->product_id);
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        for($i=0;$i< $count;$i++){
            $cartproduct->where('product_id', $product_id[$i])->update([
                        'quantity'=> $quantity[$i]
            ]);
        }
        
        return redirect()->route('cart');
    }
}
