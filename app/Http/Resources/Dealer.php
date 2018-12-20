<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Dealer extends JsonResource
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
            'id' => $this->id,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'title' => $this->title,
            'body' => $this->body,
            '_links' => [
                'self' => 'http://chesney.mach3test.com/api/dealer/' . parent::toArray($request)['id'],
                'collection' => 'http://chesney.mach3test.com/api/dealers'
            ]
        ];
    }

    public function with($request) {
        return [
            'version' => '1.0',
            'author' => 'Chesney Buitendijk',
        ];
    }
}
