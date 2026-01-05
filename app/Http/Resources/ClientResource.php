<?php

declare(strict_types=1);

namespace Modules\User\Http\Resources;

use Modules\User\Models\OauthClient as Client;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Client
 */
final class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[\Override]
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'owner' => $this->when(
                $this->owner !== null,
                fn (): \Modules\User\Http\Resources\OwnerResource => new OwnerResource($this->owner)
            ),
        ];
    }
}
