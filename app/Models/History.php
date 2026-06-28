<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';

    // 🔥 FIX: aman dari mass assignment + lebih fleksibel
    protected $guarded = [];
}