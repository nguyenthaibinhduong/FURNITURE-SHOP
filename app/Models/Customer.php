<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'phone_number',
        'address',
        'gender',
        'birth_date'
    ]; 
}
