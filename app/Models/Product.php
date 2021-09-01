<?php

namespace App\Models;
use App\Models\reviews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','detail','price', 'stock', 'discount'
    ];

    use HasFactory;
    public function reviews(){
        return $this->hasMany(reviews::class);
    }

}
