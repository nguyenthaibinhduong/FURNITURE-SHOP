<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    protected $fillable=[
        'user_id'
        
    ];
    use HasFactory;
    public function user(){
        return $this->belongsToMany(User::class);
    }
    public function getByUser($id){
        return Cart::whereUserId($id)->first();
    }
    public function findOrCreate($id){
        $cart = $this->getByUser($id);
        if(!$cart){
            $cart = Cart::create(['user_id'=>$id]);
        }
        return $cart;

    }
}
