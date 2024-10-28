<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
protected $fillable=[
    'user_id',
    'product_id',
     'custumer_name',
      'custumer_email',

        'product_price',



];
    public function products(){

        return $this->hasOne(Product::class,'product_id');
    }
    public function users(){

        return $this->belongsToMany(User::class,'user_id');
    }
}
