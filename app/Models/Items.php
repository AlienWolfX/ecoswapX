<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Example Item Model
class Items extends Model
{
    protected $fillable = ['name', 'description', 'category', 'condition', 'swap_for_item', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

