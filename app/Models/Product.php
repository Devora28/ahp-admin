<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'description_short',
        'category_id',
        'brand_id',
        'price',
        'discount',
        'stock',
        'is_active',
        'is_special',
        'vendor_id',
        'attributes',
        'thumbnail',
        'slug',
    ];
    protected $casts = [
        'p_attributes' => 'array',
        'sale_start_at' => 'datetime',
        'sale_end_at' => 'datetime',
    ];
    public function categories(){
        return $this->belongsToMany(Category::class,'category_product','product_id','category_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function variants(){
        return $this->hasMany(ProductVariant::class,'product_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'product_id');
    }
    public function orderItems(){
        return $this->hasMany(OrderItem::class,'product_id');
    }
}
