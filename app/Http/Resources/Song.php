<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Song extends JsonResource
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

        return[
            'item'=>[
                'id' => $this->id,
                'songname' => $this->songname,
                'artist' => $this->artist,
                'album' => $this->album,
                'review' => $this->review,
                '_links' => [
                    'self' => [
                        'href' => 'http://chesney.mach3test.com/api/song/' . parent::toArray($request)['id'],
                    ],
                    'collection' => [
                        'href' => 'http://chesney.mach3test.com/api/songs',
                    ]
                ]
            ]
        ];
    }
}
