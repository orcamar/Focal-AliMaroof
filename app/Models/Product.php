<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'name',
        'description',
        'price',

    ];
    public function categories(){

        return $this->belongsToMany(Category::class,'category_product','product_id','category_id');
    }
    public function orders(){

        return $this->belongsToMany(Order::class,'order_id');
    }
}
