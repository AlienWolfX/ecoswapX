<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['place_name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
