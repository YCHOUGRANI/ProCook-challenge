<?php

namespace App\Http\Resources\Product;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->product_id,
            'name-via-locale' => app()->getLocale() == 'en' ? $this->product_name : $this->product_name_fr,
            'name-via-query-string' => $request->has('lang') &&  $request->input('lang') == 'fr' ?  $this->product_name_fr : $this->product_name,
            'desc' => $this->product_desc,
            'category' => $this->category->name,
            'price' => $this->product_price,
            'href' => ['link' => route('products.show', ['category' => $this->category_id, 'product' => $this->product_id])],

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
