<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
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
                    if($value==0){
                        session(['couponpercent' =>  0 ]);
                        session(['coupon' => $coupon->name ]);
                    }else{
                        session(['couponpercent' =>  $value ]); 
                        session(['coupon' => $coupon->name ]);
                    }
                    
                    $message = 'Áp Mã giảm giá thành công !';
                }
                else if($coupon->type==='VND'){
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
        return redirect()->back()->with([
            'message' => $message
        ]);
;
    }
    public function removeCoupon(){
        if( session()->has('couponpercent')){
                session()->forget('couponpercent');
                session(['coupon' => '' ]);
                session(['discount' => 0 ]);

        }else if(session()->has('couponvalue')){
                session()->forget('couponvalue');
                session(['coupon' => '' ]);
                session(['discount' => 0 ]);
        }
        return redirect()->back();
    }
    public function createOrder(Request $request){
        $order = new Order;
        $order->order_code = $this->generateOrderCode();
        $order->user_id = Auth::user()->id;
        $order->customer_name=$request->c_name;
        $order->customer_email=$request->c_email;
        $order->customer_tel=$request->c_tel;
        $order->customer_address=$request->c_address;
        $order->total_price=$request->subtotal;
        $order->total=$request->total;
        $order->discount=$request->discount;
        $order->payment_method= $request->payment_method;
        $order->status=1;
        $order->save();
      
        $cartproduct = $this->cartProduct->where('cart_id','=',$request->cart_id)->get();
        foreach ($cartproduct as $cart){
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id= $cart->product_id;
            $order_detail->quantity = $cart->quantity;
            $order_detail->price = $cart->quantity*$cart->product_price;
            $order_detail->save();
        }
        $this->cartProduct->where('cart_id','=',$request->cart_id)->delete();
        $this->cart->find($request->cart_id)->delete();
        if( session()->has('couponpercent')){
            session()->forget('couponpercent');
            session(['coupon' => '' ]);
            session(['discount' => 0 ]);

        }else if(session()->has('couponvalue')){
            session()->forget('couponvalue');
            session(['coupon' => '' ]);
            session(['discount' => 0 ]);
        }
        return redirect()->route('orders');
    }
        public function index(){
        $cart = $this->cart->findOrCreate(auth()->user()->id);
        $cartproduct = $this->cartProduct->where('cart_id','=',$cart->id)->get();
        $this->subtotal = 0;
        $images = ProductImage::where('image_type',0)->get();
        foreach ($cartproduct as $cart){
            $this->subtotal += ($cart->product_price*$cart->quantity);
       }

       if(session()->has('couponpercent')){
            $subtotal=$this->subtotal * session('couponpercent');
       }else if(session()->has('couponvalue')){
            $subtotal=$this->subtotal - session('couponvalue');
       }else{
            $subtotal=$this->subtotal;
       }
       $oldtotal = $this->subtotal ; 
       session(['discount' => $oldtotal-$subtotal ]);
       //dd($coupon);
        return view('client.cart.index',compact('cartproduct','subtotal','images','oldtotal'));
    }
    public function checkout(){
        $cart = $this->cart->findOrCreate(auth()->user()->id);
        $cart_id =$cart->id;
        $cartproduct = $this->cartProduct->where('cart_id','=',$cart->id)->get();
        $this->subtotal = 0;
        $images = ProductImage::where('image_type',0)->get();
        foreach ($cartproduct as $cart){
            $this->subtotal += ($cart->product_price*$cart->quantity);
       }
        if(session()->has('couponpercent')){
            $subtotal=$this->subtotal * session('couponpercent');
        }else if(session()->has('couponvalue')){
            $subtotal=$this->subtotal - session('couponvalue');
        }else{
            $subtotal=$this->subtotal;
        }
        $oldtotal = $this->subtotal ; 
        session(['discount' => $oldtotal-$subtotal ]);
        $customer = Customer::where('user_id','=',Auth::user()->id)->first();
        return view('client.cart.checkout',compact('cart_id','customer','cartproduct','subtotal','oldtotal'));
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

    private function generateOrderCode()
    {
        do {
            $code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (Order::where('order_code', $code)->exists());

        return $code;
    }
    
}
