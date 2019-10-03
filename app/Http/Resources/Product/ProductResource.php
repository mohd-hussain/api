<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        // return $this->map(function($product) {
            return [

                'name' => $this->name,
                'discription' => $this->detail,
                'price' => $this->price,
                'stock' => $this->stock,
                'discount' => $this->discount
            ];
    // });
}
}