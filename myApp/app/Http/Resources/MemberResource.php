<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'memberName' => $this->member_name,
            'memberPhone' => $this->member_phone,
            'memberFeeDate' => $this->member_fee_end_date,
            'apiType' => $this->api_type,
        ];
    }
}
