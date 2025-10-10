<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
<<<<<<< HEAD
use InvalidArgumentException;
use RuntimeException;
=======
<<<<<<< HEAD
use InvalidArgumentException;
use RuntimeException;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Jenssegers\Agent\Agent;
use Modules\User\Models\Device;
use Spatie\QueueableAction\QueueableAction;

class GetCurrentDeviceAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
<<<<<<< HEAD
    public function execute(null|string $mobile_id = null): Device
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function execute(null|string $mobile_id = null): Device
=======
    public function execute(?string $mobile_id = null): Device
>>>>>>> a12f125f4a (.)
=======
    public function execute(null|string $mobile_id = null): Device
>>>>>>> b93ef594b4 (.)
=======
    public function execute(?string $mobile_id = null): Device
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        $agent = new Agent();

        $device = $agent->device();
        $platform = $agent->platform();
        $browser = $agent->browser();

        $data = [
            'device' => is_string($device) ? $device : 'unknown',
            'platform' => is_string($platform) ? $platform : 'unknown',
            'browser' => is_string($browser) ? $browser : 'unknown',
            'is_desktop' => $agent->isDesktop(),
            'is_mobile' => $agent->isMobile(),
            'is_tablet' => $agent->isTablet(),
            'is_phone' => $agent->isPhone(),
            'is_robot' => $agent->isRobot(),
        ];

        $up = [
            'version' => is_string($browser) ? $agent->version($browser) : 'unknown',
            'robot' => is_string($agent->robot()) ? $agent->robot() : 'unknown',
        ];

        if ($mobile_id !== null) {
            if (empty($mobile_id)) {
<<<<<<< HEAD
                throw new InvalidArgumentException('L\'ID mobile non può essere vuoto');
=======
<<<<<<< HEAD
                throw new InvalidArgumentException('L\'ID mobile non può essere vuoto');
=======
                throw new \InvalidArgumentException('L\'ID mobile non può essere vuoto');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            }

            $device = Device::firstOrCreate(['mobile_id' => $mobile_id]);
            if ($device === null) {
<<<<<<< HEAD
                throw new RuntimeException('Impossibile creare o trovare il dispositivo');
=======
<<<<<<< HEAD
                throw new RuntimeException('Impossibile creare o trovare il dispositivo');
=======
                throw new \RuntimeException('Impossibile creare o trovare il dispositivo');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            }
            $device->update([...$data, ...$up]);

            return $device;
        }

        $device = Device::firstOrCreate($data);
        if ($device === null) {
<<<<<<< HEAD
            throw new RuntimeException('Impossibile creare o trovare il dispositivo');
=======
<<<<<<< HEAD
            throw new RuntimeException('Impossibile creare o trovare il dispositivo');
=======
            throw new \RuntimeException('Impossibile creare o trovare il dispositivo');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }
        $device->update($up);

        return $device;
    }
}
