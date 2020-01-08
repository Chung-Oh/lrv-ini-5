<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        return [
            'identify' => $this->id,
            'title' => $this->title,
            'body' => $this->description,
            'created' => $this->created_at,
            'updated' => $this->updated_at,
            // 'api_version' => '1.0.1'
            'links' => [
                'remove' => 'link-remove',
                'update' => 'link-update'
            ]
        ];
    }
}
