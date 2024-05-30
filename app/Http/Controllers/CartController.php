<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class CartController extends Controller
{
    protected $cart;
    protected $product;
    protected $cartProduct;
    protected $subtotal;
    public function __construct(Product $product, Cart $cart, CartProduct $cartProduct)
    {
        $this->product = $product;
        $this->cart = $cart;
        $this->cartProduct = $cartProduct;
    }
    public function applyCoupon(Request $request){
        $code = $request->coupon;

        $coupon =  Coupon::where('name',$code)->first();
        if($coupon!=null){
            if (!Carbon::now()->gt($coupon->expiration_date)) {
                if($coupon->type==='%'){
                    $value =1-($coupon->value/100);
                    session(['couponpercent' =>  $value ]); 
                    session(['coupon' => $coupon->name ]);
                    $message = 'Áp Mã giảm giá thành công !';
                }
                if($coupon->type==='VND'){
                    $value = $coupon->value;
                    session(['couponvalue' => $value ]);
                    session(['coupon' => $coupon->name ]);
                    $message = 'Áp Mã giảm giá thành công !';
                }
            }else{
                $message = 'Mã giảm giá không tồn tại hoặc hết hạn!';
            }
           
        }else{
            $message = 'Mã giảm giá không tồn tại hoặc hết hạn!';
        }
        return redirect()->route('cart')->with([
            'message' => $message
        ]);
;
    }
    public function removeCoupon(){
        if( session()->has('couponpercent')){
                session()->forget('couponpercent');
                session(['coupon' => '' ]);

        }else if(session()->has('couponvalue')){
                session()->forget('couponvalue');
                session(['coupon' => '' ]);
        }
        return redirect()->route('cart');
    }
    public function index(){
        $cart = $this->cart->findOrCreate(auth()->user()->id);
        $cartproduct = $this->cartProduct->where('cart_id','=',$cart->id)->get();
        $this->subtotal = 0;
        $images = ProductImage::where('image_type',0)->get();
        foreach ($cartproduct as $cart){
            $this->subtotal += ($cart->product_price*$cart->quantity);
       }
       if(session('couponpercent')){
            $subtotal=$this->subtotal *  session('couponpercent');
            $coupon = session('coupon');
       }else if(session('couponvalue')){
            $subtotal=$this->subtotal - session('couponvalue');
            $coupon = session('coupon');
       }else{
            $subtotal=$this->subtotal;
            $coupon = session('coupon');
       }

       $oldtotal = $this->subtotal ;
       $discount =  $oldtotal-$subtotal;
       //dd($coupon);
        return view('client.cart.index',compact('cartproduct','subtotal','images','coupon','oldtotal','discount'));
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
