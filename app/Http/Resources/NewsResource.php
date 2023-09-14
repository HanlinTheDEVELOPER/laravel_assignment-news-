<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "photo" => $this->photo,
            "tag" => $this->tag,
            "body" => $this->body,
            "createdAt" => Carbon::parse($this->created_at)->format('M d, Y'),
            'regions' => RegionResource::collection($this->regions)
        ];
    }
}
