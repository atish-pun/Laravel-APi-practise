<?php

namespace App\Http\Resources\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetails extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'total_price' =>round( ($this->price - (($this->discount/100)* $this->price))),
            'rating' =>$this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No rating yet',
            'discount' => $this->discount,
            'href' => [
                'link' => route('products.show',$this->id)
            ]
        ];
    }
}
