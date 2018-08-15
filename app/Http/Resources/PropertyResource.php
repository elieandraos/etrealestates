<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
            'title' => $this->title,
            'thumb' => $this->featured_image_thumb_url,
            'area'  => $this->area->name,
            'city'  => $this->city,
            'listed_for'  => 'For '.$this->listed_for,
            'price' => $this->amount_display,
            'nb_bathrooms' => $this->nb_bathrooms,
            'nb_parkings' => $this->nb_parkings,
            'nb_bedrooms' => $this->nb_bedrooms,
            'sq_ft' => $this->sq_ft,
            'posted_at' => $this->created_at->diffForHumans()
        ];
    }
}
