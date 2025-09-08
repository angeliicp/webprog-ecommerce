<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'prod_id',
        'user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
