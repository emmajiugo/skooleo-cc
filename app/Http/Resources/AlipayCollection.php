<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AlipayCollection extends ResourceCollection
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
            'data' => $this->collection
                          ->map
                          ->toArray($request)
                          ->all(),
            'links' => [
               'self' => 'link-value',
             ],
        ];
    }
}
