<?php

namespace Modules\Authentication\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        $user = $this->resource['user'];

        return [
            'first_name' => $user->first_name ?? NULL,
            'last_name' => $user->last_name ?? NULL,
            'email' => $user->email ?? NULL
        ];
    }
}
