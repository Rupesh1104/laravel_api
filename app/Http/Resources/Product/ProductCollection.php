<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "name" => $this->name,
            "totalPrice" => round($this->price-($this->price*($this->discount/100)),2),
            'rating' => $this->review->count()>0 ? round($this->review->sum("star")/$this->review->count()):"No rating Yet",
            'discount' => $this->discount,
            "href" => [
                "link" => route("products.show",$this->id)
            ]
        ];
    }
}
