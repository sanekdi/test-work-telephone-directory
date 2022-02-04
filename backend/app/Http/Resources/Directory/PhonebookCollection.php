<?php

namespace App\Http\Resources\Directory;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PhonebookCollection extends ResourceCollection
{
    public static $wrap = false;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'phonebooks' => $this->collection,
            'phonebooksCount' => $this->count(),
        ];
    }
}
