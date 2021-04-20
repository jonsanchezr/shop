<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $products = [];
        // $i = 0;
        // foreach ($this->products as $product) {
        //     $products[$i] = [
        //         'id' => $product->id,
        //         'title' => $product->title,
        //     ];
        //     $i++;
        // }
        // $condition = $request->with == 'products' ? true : false;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'logo' => $this->logo,
            //'products' => $this->when($condition, $products),
        ];
    }
}
