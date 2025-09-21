<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

<<<<<<< HEAD
use Filament\Schemas\Schema;
=======
<<<<<<< HEAD
use Filament\Schemas\Schema;
=======
use Filament\Forms\Form;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Pages\Tenancy\EditTenantProfile as BaseEditTenantProfile;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

class EditTenantProfile extends BaseEditTenantProfile
{
    public static function getLabel(): string
    {
        return __('user::tenancy.navigation.edit');
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    public function form(Schema $schema): Schema
    {
        $resource = XotData::make()->getTenantResourceClass();

        Assert::isInstanceOf($res = $resource::form($schema), Schema::class);

        return $res;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        /*
         * return $form
         * ->schema([
         * TextInput::make('name')
         * ->required()
         * ->translateLabel(),
         * TextInput::make('phone')
         * ->required()
         * ->tel()
         * ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
         * ->translateLabel(),
         * TextInput::make('email')
         * ->required()
         * ->email()
         * ->translateLabel(),
         * ]);
         */
<<<<<<< HEAD
=======
=======
=======
    public function form(Form $form): Form
    {
        $resource = XotData::make()->getTenantResourceClass();

        Assert::isInstanceOf($res = $resource::form($form), Form::class);

        return $res;
>>>>>>> origin/develop
        /*
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->translateLabel(),
                TextInput::make('phone')
                    ->required()
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->translateLabel(),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->translateLabel(),
            ]);
        */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        /*
         * return $form
         * ->schema([
         * TextInput::make('name')
         * ->required()
         * ->translateLabel(),
         * TextInput::make('phone')
         * ->required()
         * ->tel()
         * ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
         * ->translateLabel(),
         * TextInput::make('email')
         * ->required()
         * ->email()
         * ->translateLabel(),
         * ]);
         */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
