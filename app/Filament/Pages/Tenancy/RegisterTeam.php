<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Datas\XotData;

class RegisterTeam extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register team';
    }

    /**
     * @return array<string, mixed>
     */
    /** @phpstan-ignore-next-line return.type */
    public function getFormSchema(): array
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    {
        return [
            TextInput::make('name'),
            // ...
        ];
    }
<<<<<<< HEAD
=======
{
    
        
    return [
              
                    TextInput::make('name'),
                    // ...
                
      ];
}
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

    /**
     * @param  array<string, mixed>  $data
     */
    protected function handleRegistration(array $data): Model
    {
        $teamClass = XotData::make()->getTeamClass();
        /** @var Model&TeamContract */
        $team = $teamClass::create($data);

        $team->members()->attach(auth()->user());

        return $team;
    }
}
