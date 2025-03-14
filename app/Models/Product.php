<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sku',
        'seller_id',
        'category_id',
        'sub_category_id',
        'store_id',
        'regular_price',
        'discount_price',
        'tax_rate',
        'stock_quantity',
        'stock_status',
        'slug',
        'is_featured',
        'is_active',
        'meta_title',
        'meta_description',
        'status',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subCategory() {
        return $this->belongsTo(SubCategory::class);
    }

    public function store() {
        return $this->belongsTo(Store::class);
    }

    public function seller() {
        return $this->belongsTo(User::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }
}
