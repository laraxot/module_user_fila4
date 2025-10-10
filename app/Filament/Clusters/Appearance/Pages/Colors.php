<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Appearance\Pages;

use Filament\Schemas\Schema;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Filament\Clusters\Appearance;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * @property Schema $form
=======
 * @property \Filament\Schemas\Schema $form
>>>>>>> fbc8f8e (.)
=======
 * @property Schema $form
>>>>>>> 6d20fbe (.)
 */
class Colors extends Page implements HasForms
{
    use InteractsWithForms;

<<<<<<< HEAD
<<<<<<< HEAD
    public null|array $data = [];
=======
    public ?array $data = [];
>>>>>>> fbc8f8e (.)
=======
    public null|array $data = [];
>>>>>>> 6d20fbe (.)

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected string $view = 'user::filament.clusters.appearance.pages.colors';

<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|string $cluster = Appearance::class;

    protected static null|int $navigationSort = 3;
=======
    protected static ?string $cluster = Appearance::class;

    protected static ?int $navigationSort = 3;
>>>>>>> fbc8f8e (.)
=======
    protected static null|string $cluster = Appearance::class;

    protected static null|int $navigationSort = 3;
>>>>>>> 6d20fbe (.)

    public function mount(): void
    {
        $this->fillForms();
    }

    // protected function getForms(): array
    // {
    //    return [
    //        'editLogoForm',
    //    ];
    // }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Forms\Components\Section::make('Profile Information')
                // ->description('Update your account\'s profile information and email address.')
                // ->schema([
                ColorPicker::make('text_color'),
                ColorPicker::make('button_color'),
                ColorPicker::make('button_text_color'),
                ColorPicker::make('input_text_color'),
                ColorPicker::make('input_border_color'),
<<<<<<< HEAD
<<<<<<< HEAD
                // ])->columns(2),
            ])
            ->columns(3)
=======

                // ])->columns(2),
            ])->columns(3)
>>>>>>> fbc8f8e (.)
=======
                // ])->columns(2),
            ])
            ->columns(3)
>>>>>>> 6d20fbe (.)
            // ->model($this->getUser())
            ->statePath('data');
    }

    public function updateData(): void
    {
        try {
            $data = $this->form->getState();
            dddx($data);
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
            // $this->handleRecordUpdate($this->getUser(), $data);
        } catch (Halt $exception) {
            dddx($exception->getMessage());

            return;
        }
    }

    protected function fillForms(): void
    {
        // $data = $this->getUser()->attributesToArray();
        $data = [];

        $this->form->fill($data);
    }

    protected function getUpdateFormActions(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            Action::make('updateAction')->submit('editForm'),
=======
            Action::make('updateAction')

                ->submit('editForm'),
>>>>>>> fbc8f8e (.)
=======
            Action::make('updateAction')->submit('editForm'),
>>>>>>> 6d20fbe (.)
        ];
    }

    /**
     * @param  array<string, mixed>  $data
     */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        return $record;
    }
}
