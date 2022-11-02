<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'br_id',
        'product_id',
        'invoice',
        'quantity',
        'dis',
        'dis_amount',
        'total_amount'
    ];


    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
