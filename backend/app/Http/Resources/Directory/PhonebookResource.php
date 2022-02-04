<?php

namespace App\Http\Resources\Directory;

use Illuminate\Http\Resources\Json\JsonResource;

class PhonebookResource extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'family' => $this->family,
            'name' => $this->name,
            'middle_name' => $this->middle_name,
            'phone' => $this->phone,
            'category' => $this->category->name,
        ];
    }
}
