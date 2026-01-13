<?php

declare(strict_types=1);

namespace Modules\User\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\Models\OauthClient as Client;

/**
<<<<<<< HEAD
 * @property \Modules\User\Models\User|null $owner
 *
=======
>>>>>>> 5aac2b68 (.)
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
<<<<<<< HEAD
                isset($this->owner),
=======
                null !== $this->owner,
>>>>>>> 5aac2b68 (.)
                fn (): OwnerResource => new OwnerResource($this->owner)
            ),
        ];
    }
}
