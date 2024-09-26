<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'dob',
        'gender',
        'user_role',
        'is_subscribed',
        'verification_code',
        'verified',
        'membership_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function membership()
    {
        return $this->belongsTo(Membership::class,'membership_id');
    }

    // public function address()
    // {
    //     return $this->hasOne(UserAddress::class);
    // }
    // public function usercompany()
    // {
    //     return $this->hasOne(UserCompany::class);
    // }

    public function category(){
        return $this->belongsTo(UserWithCategories::class ,'user_id');
    }
}
