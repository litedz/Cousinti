<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_messages extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'from_user_id', 'email', 'subject'];

    protected $with = ['from_user'];

    public function from_user()
    {
        return $this->belongsTo(User::class, 'from_user_id', 'id');
    }
}
