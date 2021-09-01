<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    protected $fillable = [
        'customer_name', 'review' ,'star'
    ];
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
