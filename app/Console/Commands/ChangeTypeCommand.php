<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeObjectCastAction;
use Illuminate\Console\Command;
=======
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeObjectCastAction;
use Illuminate\Console\Command;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Support\Arr;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;
use Webmozart\Assert\Assert;

use function Laravel\Prompts\select;
use function Laravel\Prompts\text;
<<<<<<< HEAD
=======
=======
=======
use Illuminate\Support\Arr;
>>>>>>> b93ef594b4 (.)
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;
use Webmozart\Assert\Assert;

use function Laravel\Prompts\select;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use function Laravel\Prompts\text;
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Console\Command;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Input\InputOption;
use Webmozart\Assert\Assert;

use function Laravel\Prompts\text;
use function Laravel\Prompts\select;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

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
    
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    
=======
=======
>>>>>>> origin/develop
    public function __construct()
    {
        parent::__construct();
    }
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

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

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        $typeLabel = $user->type?->getLabel() ?? 'None';
        $typeLabelString = is_string($typeLabel) ? $typeLabel : $typeLabel->toHtml();
        $this->info("Current user type: " . $typeLabelString);

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        $this->info("Current user type: {$user->type?->getLabel()}");
        
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        $this->info("Current user type: {$user->type?->getLabel()}");
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $typeClass = $xot->getUserChildTypeClass();
        /** @var array<string, string> */
        $options = [];
        foreach ($childTypes as $key => $item) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
            if (
                is_object($item) &&
                    method_exists($item, 'getLabel') &&
                    app(SafeObjectCastAction::class)->hasNonNullProperty($item, 'value')
            ) {
                $value = app(SafeObjectCastAction::class)
                    ->getStringProperty($item, 'value', '');
                $options[$value] = (string) $item->getLabel();
<<<<<<< HEAD
            } else {
                $options[(string) $key] = 'Unknown';
=======
<<<<<<< HEAD
            } else {
                $options[(string) $key] = 'Unknown';
=======
            if (is_object($item) && method_exists($item, 'getLabel') && app(SafeObjectCastAction::class)->hasNonNullProperty($item, 'value')) {
                $value = app(SafeObjectCastAction::class)->getStringProperty($item, 'value', '');
                $options[$value] = (string)$item->getLabel();
            } else {
                $options[(string)$key] = 'Unknown';
>>>>>>> a12f125f4a (.)
=======
            } else {
                $options[(string) $key] = 'Unknown';
>>>>>>> b93ef594b4 (.)
=======
            if (is_object($item) && method_exists($item, 'getLabel') && app(\Modules\Xot\Actions\Cast\SafeObjectCastAction::class)->hasNonNullProperty($item, 'value')) {
                $value = app(\Modules\Xot\Actions\Cast\SafeObjectCastAction::class)->getStringProperty($item, 'value', '');
                $options[$value] = (string)$item->getLabel();
            } else {
                $options[(string)$key] = 'Unknown';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            }
        }

        $newType = select('Select new user type:', $options);
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        $newTypeEnum = $typeClass::tryFrom($newType);
        Assert::notNull($newTypeEnum);

        $user->type = $newTypeEnum;
        $user->save();

<<<<<<< HEAD
=======
=======
        
=======

>>>>>>> b93ef594b4 (.)
        $newTypeEnum = $typeClass::tryFrom($newType);
        Assert::notNull($newTypeEnum);

        $user->type = $newTypeEnum;
        $user->save();
<<<<<<< HEAD
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
        $newTypeEnum = $typeClass::tryFrom($newType);
        Assert::notNull($newTypeEnum);

        
        $user->type = $newTypeEnum;
        $user->save();
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $this->info("User type changed to '{$newTypeEnum->getLabel()}' for {$email}");
    }
}
