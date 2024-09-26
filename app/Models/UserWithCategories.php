<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWithCategories extends Model
{
    use HasFactory;

    protected $table = "user_with_categories";

    protected $guarded = [];

}
