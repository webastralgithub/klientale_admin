<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareMail extends Model
{
    use HasFactory;

    protected $table = 'share_mail';

    protected $guarded = [];

    public function sendContact(){
        return $this->belongsTo(Contact::class ,'referrer_id');
    }
    public function recieverContact(){
        return $this->belongsTo(Contact::class ,'reciver_id');
    }
}
