<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Support\Arr;
use Modules\User\Filament\Resources\BaseProfileResource;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class CreateProfile extends XotBaseCreateRecord
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class CreateProfile extends XotBaseCreateRecord
=======

use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class CreateProfile extends \Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
{
    protected static string $resource = BaseProfileResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $user_data = Arr::except($data, ['user']);
        $extra = $data['user'] ?? [];
<<<<<<< HEAD
        if (!is_array($extra)) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (!is_array($extra)) {
=======
        if (! is_array($extra)) {
>>>>>>> a12f125f4a (.)
=======
        if (!is_array($extra)) {
>>>>>>> b93ef594b4 (.)
=======
        if (! is_array($extra)) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            $extra = [];
        }
        $user_data = array_merge($user_data, $extra);
        $user_class = XotData::make()->getUserClass();
<<<<<<< HEAD
        /** @var UserContract */
=======
<<<<<<< HEAD
        /** @var UserContract */
=======
        /** @var \Modules\Xot\Contracts\UserContract */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $user = $user_class::create($user_data);
        $data['user_id'] = $user->getKey();

        return $data;
    }
}
