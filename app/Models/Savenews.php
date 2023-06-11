<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Savenews extends Model
{
    use HasFactory;
    protected $table='savenews';

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function news()
    {
        return $this->belongsTo(Product::class,'news_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // Cần có những trường bắt buộc phải thay đổi
    protected $fillable = [
        'user_id',
        'news_id'
    ];

}
