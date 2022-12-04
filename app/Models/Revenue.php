<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(RevenueCategory::class, 'revenue_category_id');
    }
}
