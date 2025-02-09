<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'first_name', 'middle_name', 'last_name',
        'email', 'mobile_number', 'landline_number', 'notes', 'photo', 'view_count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

