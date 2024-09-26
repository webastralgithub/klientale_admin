<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferenceCategory extends Model
{
    use HasFactory;
    
    protected $table = 'preference_categories';

    protected $guarded = [];
}
