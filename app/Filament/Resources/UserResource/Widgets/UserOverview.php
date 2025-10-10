<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class UserOverview extends Widget
{
    public null|Model $record = null;
<<<<<<< HEAD

    protected string $view = 'user::filament.resources.user-resource.widgets.user-overview';
=======
=======




=======
>>>>>>> b93ef594b4 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class UserOverview extends Widget
{
<<<<<<< HEAD
    public ?Model $record = null;
>>>>>>> a12f125f4a (.)
=======
    public null|Model $record = null;
>>>>>>> b93ef594b4 (.)

    protected string $view = 'user::filament.resources.user-resource.widgets.user-overview';
=======




use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;





class UserOverview extends Widget
{
    public ?Model $record = null;

    protected static string $view = 'user::filament.resources.user-resource.widgets.user-overview';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
