<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        dd($this);
        return [
            'name' => $this->name,
            'description' => $this->description,
            'href' => ['link' => route('categories.show', $this->id)],
        ];
    }
}
