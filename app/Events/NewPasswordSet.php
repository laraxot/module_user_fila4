<?php

declare(strict_types=1);

namespace Modules\User\Events;

<<<<<<< HEAD
use Illuminate\Broadcasting\Channel;
=======
<<<<<<< HEAD
use Illuminate\Broadcasting\Channel;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Xot\Contracts\UserContract;

class NewPasswordSet
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public UserContract $authObject,
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/develop
=======
    ) {
    }
>>>>>>> a382d4f1 (.)

    /**
     * Get the channels the event should broadcast on.
     *
<<<<<<< HEAD
     * @return array<int, Channel>
=======
<<<<<<< HEAD
     * @return array<int, Channel>
=======
     * @return array<int, \Illuminate\Broadcasting\Channel>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
