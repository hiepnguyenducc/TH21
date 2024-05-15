<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders_overview';
    protected $fillable = [
        'user_id',
        'cus_name',
        'cus_email',
        'cus_phone',
        'cus_address',
        'note',
        'total',
        'subtotal',
        'status',
    ];
    
}
