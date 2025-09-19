<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Modules\Xot\Actions\Cast\SafeObjectCastAction;
use Illuminate\Console\Command;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
use Illuminate\Support\Arr;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;
use Webmozart\Assert\Assert;

use function Laravel\Prompts\select;
use function Laravel\Prompts\text;
<<<<<<< HEAD
=======
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Input\InputOption;
use Webmozart\Assert\Assert;

use function Laravel\Prompts\text;
use function Laravel\Prompts\select;
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

/**
 * Command to change user type based on project configuration.
 *
 * This command allows administrators to change the type of a user
 * by selecting from available child types in the system.
 */
class ChangeTypeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'user:change-type';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change user type based on project configuration';

    /**
     * Create a new command instance.
     *
     * @return void
     */
<<<<<<< HEAD
<<<<<<< HEAD
    
=======
    public function __construct()
    {
        parent::__construct();
    }
>>>>>>> fbc8f8e (.)
=======
    
>>>>>>> 6d20fbe (.)

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $xot = XotData::make();
        $email = text('User email?');
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
        /** @var UserContract $user */
        $user = XotData::make()->getUserByEmail($email);

        if (!$user) {
            $this->error("User with email '{$email}' not found.");
            return;
        }
        if (!method_exists($user, 'getChildTypes')) {
            $this->error('User model does not have childTypes method.');
            return;
        }

        $childTypes = $xot->getUserChildTypes();
        /** @phpstan-ignore nullsafe.neverNull */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        $typeLabel = $user->type?->getLabel() ?? 'None';
        $typeLabelString = is_string($typeLabel) ? $typeLabel : $typeLabel->toHtml();
        $this->info("Current user type: " . $typeLabelString);

<<<<<<< HEAD
=======
        $this->info("Current user type: {$user->type?->getLabel()}");
        
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        $typeClass = $xot->getUserChildTypeClass();
        /** @var array<string, string> */
        $options = [];
        foreach ($childTypes as $key => $item) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
            if (
                is_object($item) &&
                    method_exists($item, 'getLabel') &&
                    app(SafeObjectCastAction::class)->hasNonNullProperty($item, 'value')
            ) {
                $value = app(SafeObjectCastAction::class)
                    ->getStringProperty($item, 'value', '');
                $options[$value] = (string) $item->getLabel();
            } else {
                $options[(string) $key] = 'Unknown';
<<<<<<< HEAD
=======
            if (is_object($item) && method_exists($item, 'getLabel') && app(SafeObjectCastAction::class)->hasNonNullProperty($item, 'value')) {
                $value = app(SafeObjectCastAction::class)->getStringProperty($item, 'value', '');
                $options[$value] = (string)$item->getLabel();
            } else {
                $options[(string)$key] = 'Unknown';
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            }
        }

        $newType = select('Select new user type:', $options);
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

        $newTypeEnum = $typeClass::tryFrom($newType);
        Assert::notNull($newTypeEnum);

        $user->type = $newTypeEnum;
        $user->save();

<<<<<<< HEAD
=======
        
        $newTypeEnum = $typeClass::tryFrom($newType);
        Assert::notNull($newTypeEnum);

        
        $user->type = $newTypeEnum;
        $user->save();
        
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        $this->info("User type changed to '{$newTypeEnum->getLabel()}' for {$email}");
    }
}
