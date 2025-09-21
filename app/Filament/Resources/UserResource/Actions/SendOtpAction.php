<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Actions;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Actions\Action;
use RuntimeException;
use Modules\User\Actions\Otp\SendOtpByUserAction;
use Modules\User\Models\User;
use Modules\Xot\Contracts\UserContract;
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
<<<<<<< HEAD
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> a12f125f4a (.)
=======
use Webmozart\Assert\Assert;
>>>>>>> b93ef594b4 (.)
=======
use Filament\Tables\Actions\Action;
use Modules\User\Actions\Otp\SendOtpByUserAction;
use Modules\User\Models\User;
use Modules\Xot\Contracts\UserContract;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

/**
 * Azione Filament per l'invio di un OTP all'utente.
 */
class SendOtpAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

<<<<<<< HEAD
        $this->tooltip(trans('user::otp.actions.send_otp'))
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->tooltip(trans('user::otp.actions.send_otp'))
=======
        $this
            ->tooltip(trans('user::otp.actions.send_otp'))
>>>>>>> a12f125f4a (.)
=======
        $this->tooltip(trans('user::otp.actions.send_otp'))
>>>>>>> b93ef594b4 (.)
=======
        $this
            ->tooltip(trans('user::otp.actions.send_otp'))
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            ->icon('heroicon-o-key')
            ->action(function (User $record) {
                // Sappiamo già che l'utente implementa UserContract perché il tipo User lo implementa
                $action = app(SendOtpByUserAction::class);
                if ($action === null) {
<<<<<<< HEAD
                    throw new RuntimeException('Impossibile istanziare SendOtpByUserAction');
                }
                // User model extends BaseUser which implements UserContract interface
                Assert::isInstanceOf($record, UserContract::class);
=======
<<<<<<< HEAD
                    throw new RuntimeException('Impossibile istanziare SendOtpByUserAction');
                }
<<<<<<< HEAD
<<<<<<< HEAD
                // User model extends BaseUser which implements UserContract interface
                Assert::isInstanceOf($record, UserContract::class);
=======
>>>>>>> a12f125f4a (.)
=======
                // User model extends BaseUser which implements UserContract interface
                Assert::isInstanceOf($record, UserContract::class);
>>>>>>> b93ef594b4 (.)
=======
                    throw new \RuntimeException('Impossibile istanziare SendOtpByUserAction');
                }
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                $action->execute($record);
            })
            ->requiresConfirmation()
            ->modalHeading(trans('user::otp.actions.send_otp'))
            ->modalSubheading(trans('user::otp.actions.confirm_otp'))
            ->modalButton(trans('user::otp.actions.yes_send_otp'));
    }

    /**
     * Ottieni il nome predefinito dell'azione.
     */
<<<<<<< HEAD
    public static function getDefaultName(): null|string
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public static function getDefaultName(): null|string
=======
    public static function getDefaultName(): ?string
>>>>>>> a12f125f4a (.)
=======
    public static function getDefaultName(): null|string
>>>>>>> b93ef594b4 (.)
=======
    public static function getDefaultName(): ?string
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return 'send_otp';
    }
}
