<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Commands Artisan: php artisan make:resource Products --collection
 */
class Products extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'data' => $this->collection->map(function ($product) {
                return new Product($product);
            }),
            'api_version' => '1.0.1'
        ];
    }
}
