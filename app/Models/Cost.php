<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(CostCategory::class, 'cost_category_id');
    }
}
