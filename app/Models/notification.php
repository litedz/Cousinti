<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;

    protected $fillable = ['recipient_id', 'from_id', 'subject', 'message', 'type', 'status', 'path'];
}
