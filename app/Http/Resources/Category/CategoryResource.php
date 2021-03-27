<?php

namespace App\Http\Resources\Category;

use App\Model\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'href' => ['products' => route('products.index', $this->id)]
        ];
    }
    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => 'youcef'
        ];
    }
}
