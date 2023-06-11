<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='da5_product';

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function warehouse()
    {
        // kho này k còn sử dụng nữa
        return $this->hasOne(Warehouse::class);
    }
    public function category()
    {
        return $this->belongsTo(Category_product::class);
    }
    public function cartDetails()
    {
        return $this->hasMany(Carts_details::class,'product_id');
    }
    public function orderDetails()
    {
        return $this->hasMany(Carts_details::class,'product_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brands::class);
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ward()
    {
        return $this->belongsTo(Ward::class, 'wards_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

   public function save_news()
    {
        return $this->hasMany(Savenews::class,'news_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'category_id',
        'brand_id',
        'name',
        'default_price',
        'room_area',
        'at_maximum',
        'total_room',
        'preferred_gender',
        'self_governance',
        'host',
        'phone',
        // 'price',
        'description',
        'tech_specs',
        'hashtag',
        'quantity',
        'status',
        'address',
        'province_id',
        'district_id',
        'wards_id',
        'user_id'
    ];
}
