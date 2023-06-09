<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'email', 'message', 'recipient_id'];

    protected $with=['from_user'];
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user_recipient');
    // }


    public function from_user()
    {
        return $this->belongsTo(User::class,'from_id','id');
    }
}
