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
class Logo extends Page implements HasForms
{
    use InteractsWithForms;

<<<<<<< HEAD
    public null|array $logoData = [];
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public null|array $logoData = [];
=======
    public ?array $logoData = [];
>>>>>>> a12f125f4a (.)
=======
    public null|array $logoData = [];
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected string $view = 'user::filament.clusters.appearance.pages.logo';

<<<<<<< HEAD
    protected static null|string $cluster = Appearance::class;

    protected static null|int $navigationSort = 1;
=======
<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|string $cluster = Appearance::class;

    protected static null|int $navigationSort = 1;
=======
    protected static ?string $cluster = Appearance::class;

    protected static ?int $navigationSort = 1;
>>>>>>> a12f125f4a (.)
=======
    protected static null|string $cluster = Appearance::class;

    protected static null|int $navigationSort = 1;
>>>>>>> b93ef594b4 (.)
=======
    public ?array $logoData = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'user::filament.clusters.appearance.pages.logo';

    protected static ?string $cluster = Appearance::class;

    protected static ?int $navigationSort = 1;
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
                FileUpload::make('logo'),
                FileUpload::make('logo_dark'),
                TextInput::make('logo_height')->numeric()->default(32),
                // ])->columns(2),
<<<<<<< HEAD
            ])
            ->columns(2)
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            ])
            ->columns(2)
=======
            ])->columns(2)
>>>>>>> a12f125f4a (.)
=======
            ])
            ->columns(2)
>>>>>>> b93ef594b4 (.)
=======
            ])->columns(2)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // ->model($this->getUser())
            ->statePath('logoData');
    }

    public function updateLogo(): void
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

    protected function getUpdateLogoFormActions(): array
    {
        return [
<<<<<<< HEAD
            Action::make('updateLogoAction')->submit('editLogoForm'),
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            Action::make('updateLogoAction')->submit('editLogoForm'),
=======
            Action::make('updateLogoAction')

                ->submit('editLogoForm'),
>>>>>>> a12f125f4a (.)
=======
            Action::make('updateLogoAction')->submit('editLogoForm'),
>>>>>>> b93ef594b4 (.)
=======
            Action::make('updateLogoAction')

                ->submit('editLogoForm'),
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
