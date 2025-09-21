<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Appearance\Pages;

<<<<<<< HEAD
use Filament\Schemas\Schema;
=======
<<<<<<< HEAD
use Filament\Schemas\Schema;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
use Filament\Forms\Form;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Filament\Clusters\Appearance;

/**
<<<<<<< HEAD
 * @property Schema $form
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @property Schema $form
=======
 * @property \Filament\Schemas\Schema $form
>>>>>>> a12f125f4a (.)
=======
 * @property Schema $form
>>>>>>> b93ef594b4 (.)
=======
 * @property Forms\ComponentContainer $form
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 */
class Favicon extends Page implements HasForms
{
    use InteractsWithForms;

<<<<<<< HEAD
    public null|array $data = [];
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public null|array $data = [];
=======
    public ?array $data = [];
>>>>>>> a12f125f4a (.)
=======
    public null|array $data = [];
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected string $view = 'user::filament.clusters.appearance.pages.favicon';

<<<<<<< HEAD
    protected static null|string $cluster = Appearance::class;

    protected static null|int $navigationSort = 5;
=======
<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|string $cluster = Appearance::class;

    protected static null|int $navigationSort = 5;
=======
    protected static ?string $cluster = Appearance::class;

    protected static ?int $navigationSort = 5;
>>>>>>> a12f125f4a (.)
=======
    protected static null|string $cluster = Appearance::class;

    protected static null|int $navigationSort = 5;
>>>>>>> b93ef594b4 (.)
=======
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'user::filament.clusters.appearance.pages.favicon';

    protected static ?string $cluster = Appearance::class;

    protected static ?int $navigationSort = 5;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

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

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
<<<<<<< HEAD
=======
=======
    public function form(Form $form): Form
    {
        return $form
            ->schema([
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                // Forms\Components\Section::make('Profile Information')
                // ->description('Update your account\'s profile information and email address.')
                // ->schema([
                ColorPicker::make('background_color'),
                FileUpload::make('background'),
                ColorPicker::make('overlay_color'),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                TextInput::make('overlay_opacity')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
<<<<<<< HEAD
                // ])->columns(2),
            ])
            ->columns(2)
=======
<<<<<<< HEAD
                // ])->columns(2),
            ])
            ->columns(2)
=======
=======
>>>>>>> origin/develop
                TextInput::make('overlay_opacity')->numeric()->minValue(0)->maxValue(100),

                // ])->columns(2),
            ])->columns(2)
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
                // ])->columns(2),
            ])
            ->columns(2)
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // ->model($this->getUser())
            ->statePath('data');
    }

    public function updateData(): void
    {
        try {
            $data = $this->form->getState();
            dddx($data);
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
            Action::make('updateAction')->submit('editForm'),
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            Action::make('updateAction')->submit('editForm'),
=======
            Action::make('updateAction')

                ->submit('editForm'),
>>>>>>> a12f125f4a (.)
=======
            Action::make('updateAction')->submit('editForm'),
>>>>>>> b93ef594b4 (.)
=======
            Action::make('updateAction')

                ->submit('editForm'),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
