<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;


    public function branch(){
        return $this->belongsTo(Branch::class, 'br_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
