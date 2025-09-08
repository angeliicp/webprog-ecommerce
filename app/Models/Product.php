<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'prod_id';

    protected $fillable = [
        'prod_name',
        'price',
        'description',
        'top_notes',
        'mid_notes',
        'base_notes',
        'concentration',
        'fragrance_gender',
        'age_group',
        'keyword'
    ];

    public function visual_contents()
    {
        return $this->hasMany(VisualContent::class, 'prod_id', 'prod_id');
    }

    public function has_rating()
    {
        return $this->hasMany(Rating::class, 'prod_id', 'prod_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'prod_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_products', 'prod_id', 'order_id')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

}
