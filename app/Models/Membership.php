<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $table = 'memberships';
    protected $guarded = [];

    protected $fillable = [
        'name',
        'description',
        'price',
        'is_popular',
        'status',
        'user_id',
        'category_id',
        'stripe_price',
    ];

    public function category(){
        return $this->hasOne(Categories::class,'id','category_id');
    }
}
