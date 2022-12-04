<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreIn extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function warhouse()
    {
        return $this->belongsTo(Warhouse::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
