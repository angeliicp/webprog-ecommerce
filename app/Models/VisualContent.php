<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisualContent extends Model
{
    use HasFactory;

    protected $table = 'viscontents';
    protected $primaryKey = 'id';

    protected $fillable = [
        'prod_id',
        'filename',
        'alt_desc',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id', 'prod_id');
    }
}
