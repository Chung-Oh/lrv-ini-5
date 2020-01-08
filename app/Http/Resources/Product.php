<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Command Artisan: php artisan make:resource Product
 */
class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $deleted = $this->deleted ? 'yes' : 'not';

        return [
            'identify' => $this->id,
            'title' => $this->title,
            'body' => $this->description,
            'created' => $this->created_at,
            'updated' => $this->updated_at,
            'activated' => $this->activated,
            'deleted' => $deleted,
            // 'api_version' => '1.0.1'
            'links' => [
                'remove' => 'link-remove',
                'update' => 'link-update'
            ]
        ];
    }
}
