<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'customer_id',
        'price',
        'deposit',
        'paid',
        'initial',
        'comment',
        'brand_id',
        'stock_number',
        'product_name',
        'order_status_id',
    ];
}


