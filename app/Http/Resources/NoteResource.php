<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'group_id' => $this->group->id,
            'group_name' => $this->group->name,
        ];
    }
}
