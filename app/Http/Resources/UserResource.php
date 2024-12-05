<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $randomDay = rand(1, 30);
        return [
            'id' => $this->id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'fullName' => $this->fullName,
            'email' => $this->email,
            'dob' => $this->dob,
            'profileImgUrl' => $this->profile_img,
            'beltColor' => ucfirst($this->belt_color),
            'expiredAt' => date('F j, Y', strtotime("+{$randomDay} days")),
            'createdAt' => date('F j, Y', strtotime($this->created_at)),
        ];
    }
}
