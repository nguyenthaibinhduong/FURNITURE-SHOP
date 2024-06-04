<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'title',
        'sub_title',
        'uploaded',
        'image',
    ];
}
