<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages;

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
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
use Filament\Forms\Form;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;
use Modules\Tenant\Services\TenantService;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Forms\Components\Section;

/**
 * Pagina per la gestione delle impostazioni delle password.
 *
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
class Password extends Page implements HasForms
{
    use InteractsWithForms;
    use TransTrait;

    /**
     * Dati del form per la gestione delle password.
     *
     * @var array<string, mixed>|null
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    public null|array $formData = [];

    /**
     * Icona per la navigazione.
     *
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    public ?array $formData = [];

    /**
     * Icona per la navigazione.
     * 
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    public null|array $formData = [];

    /**
     * Icona per la navigazione.
     *
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
     * @var string|null
     */
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    /**
     * Vista per la pagina.
<<<<<<< HEAD
     *
=======
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> a12f125f4a (.)
=======
     *
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
     * @var string
     */
    protected string $view = 'user::filament.pages.password';

    /**
     * Ordinamento nella navigazione.
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     *
     * @var int|null
     */
    protected static null|int $navigationSort = 1;
<<<<<<< HEAD
=======
=======
=======
     * @var string|null
     */
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    /**
     * Vista per la pagina.
     * 
     * @var string
     */
    protected static string $view = 'user::filament.pages.password';

    /**
     * Ordinamento nella navigazione.
>>>>>>> origin/develop
     * 
     * @var int|null
     */
    protected static ?int $navigationSort = 1;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
     *
     * @var int|null
     */
    protected static null|int $navigationSort = 1;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Inizializza la pagina.
     */
    public function mount(): void
    {
        $this->fillForms();
    }

    /**
     * Definisce la struttura del form.
     *
<<<<<<< HEAD
     * @param Schema $schema Il form da configurare
     * @return Schema Il form configurato
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param Schema $schema Il form da configurare
     * @return Schema Il form configurato
=======
     * @param \Filament\Schemas\Schema $schema Il form da configurare
     * @return \Filament\Schemas\Schema Il form configurato
>>>>>>> a12f125f4a (.)
=======
     * @param Schema $schema Il form da configurare
     * @return Schema Il form configurato
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                TextInput::make('otp_expiration_minutes')
                    // Durata in minuti della validità della password temporanea
                    ->numeric()
                    ->helperText(static::trans('fields.otp_expiration_minutes.help'))
                    ->default(60),
                TextInput::make('otp_length')
                    // Lunghezza del codice OTP
                    ->helperText(static::trans('fields.otp_length.help'))
                    ->numeric(),
                TextInput::make('expires_in')->helperText(static::trans('fields.expires_in.help'))->numeric(), // The number of days before the password expires.
                TextInput::make('min')->helperText(static::trans('fields.min.help'))->numeric(), // = 6; // The minimum size of the password.
                Toggle::make('mixedCase')->helperText(static::trans('fields.mixedCase.help')), // = false; // If the password requires at least one uppercase and one lowercase letter.
                Toggle::make('letters')->helperText(static::trans('fields.letters.help')), // = false; // If the password requires at least one letter.
                Toggle::make('numbers')->helperText(static::trans('fields.numbers.help')), // = false; // If the password requires at least one number.
                Toggle::make('symbols')->helperText(static::trans('fields.symbols.help')), // = false; // If the password requires at least one symbol.
                Toggle::make('uncompromised')->helperText(static::trans('fields.uncompromised.help')), // = false; // If the password should not have been compromised in data leaks.
                TextInput::make('compromisedThreshold')
                    ->helperText(static::trans('fields.compromisedThreshold.help'))
                    ->numeric(), // = 1; // The number of times a password can appear in data leaks before being considered compromised.
            ])
            ->columns(3)
<<<<<<< HEAD
=======
=======
                TextInput::make('otp_expiration_minutes')// Durata in minuti della validità della password temporanea
=======
                TextInput::make('otp_expiration_minutes')
                    // Durata in minuti della validità della password temporanea
>>>>>>> b93ef594b4 (.)
                    ->numeric()
                    ->helperText(static::trans('fields.otp_expiration_minutes.help'))
                    ->default(60),
                TextInput::make('otp_length')
                    // Lunghezza del codice OTP
                    ->helperText(static::trans('fields.otp_length.help'))
                    ->numeric(),
                TextInput::make('expires_in')->helperText(static::trans('fields.expires_in.help'))->numeric(), // The number of days before the password expires.
                TextInput::make('min')->helperText(static::trans('fields.min.help'))->numeric(), // = 6; // The minimum size of the password.
                Toggle::make('mixedCase')->helperText(static::trans('fields.mixedCase.help')), // = false; // If the password requires at least one uppercase and one lowercase letter.
                Toggle::make('letters')->helperText(static::trans('fields.letters.help')), // = false; // If the password requires at least one letter.
                Toggle::make('numbers')->helperText(static::trans('fields.numbers.help')), // = false; // If the password requires at least one number.
                Toggle::make('symbols')->helperText(static::trans('fields.symbols.help')), // = false; // If the password requires at least one symbol.
                Toggle::make('uncompromised')->helperText(static::trans('fields.uncompromised.help')), // = false; // If the password should not have been compromised in data leaks.
                TextInput::make('compromisedThreshold')
                    ->helperText(static::trans('fields.compromisedThreshold.help'))
                    ->numeric(), // = 1; // The number of times a password can appear in data leaks before being considered compromised.
<<<<<<< HEAD
            ])->columns(3)
>>>>>>> a12f125f4a (.)
=======
            ])
            ->columns(3)
>>>>>>> b93ef594b4 (.)
=======
     * @param Form $form Il form da configurare
     * @return Form Il form configurato
     */
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('otp_expiration_minutes')// Durata in minuti della validità della password temporanea
                    ->numeric()
                    ->helperText(static::trans('fields.otp_expiration_minutes.help'))
                    ->default(60),
                TextInput::make('otp_length')// Lunghezza del codice OTP
                    ->helperText(static::trans('fields.otp_length.help'))
                    ->numeric(),
                TextInput::make('expires_in')
                    ->helperText(static::trans('fields.expires_in.help'))
                    ->numeric(), // The number of days before the password expires.

                TextInput::make('min')
                    ->helperText(static::trans('fields.min.help'))
                    ->numeric(), // = 6; // The minimum size of the password.
                Toggle::make('mixedCase')
                    ->helperText(static::trans('fields.mixedCase.help')), // = false; // If the password requires at least one uppercase and one lowercase letter.
                Toggle::make('letters')
                    ->helperText(static::trans('fields.letters.help')), // = false; // If the password requires at least one letter.
                Toggle::make('numbers')
                    ->helperText(static::trans('fields.numbers.help')), // = false; // If the password requires at least one number.
                Toggle::make('symbols')
                    ->helperText(static::trans('fields.symbols.help')), // = false; // If the password requires at least one symbol.
                Toggle::make('uncompromised')
                    ->helperText(static::trans('fields.uncompromised.help')), // = false; // If the password should not have been compromised in data leaks.
                TextInput::make('compromisedThreshold')
                    ->helperText(static::trans('fields.compromisedThreshold.help'))
                    ->numeric(), // = 1; // The number of times a password can appear in data leaks before being considered compromised.
            ])->columns(3)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // ->model($this->getUser())
            ->statePath('formData');
    }

    /**
     * Aggiorna i dati delle impostazioni delle password.
     *
     * @return void
     */
    public function updateData(): void
    {
        try {
            /** @var array<string, mixed> $data */
            $data = $this->form->getState();
            TenantService::saveConfig('password', $data);
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
        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }

    /**
     * Riempie i form con i dati esistenti.
     *
     * @return void
     */
    protected function fillForms(): void
    {
        $data = PasswordData::make()->toArray();

        $this->form->fill($data);
    }

    /**
     * Restituisce le azioni per il form di aggiornamento.
     *
     * @return array<Action>
     */
    protected function getUpdateFormActions(): array
    {
        return [
<<<<<<< HEAD
            Action::make('updateDataAction')->submit('editDataForm'),
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            Action::make('updateDataAction')->submit('editDataForm'),
=======
            Action::make('updateDataAction')
                ->submit('editDataForm'),
>>>>>>> a12f125f4a (.)
=======
            Action::make('updateDataAction')->submit('editDataForm'),
>>>>>>> b93ef594b4 (.)
=======
            Action::make('updateDataAction')
                ->submit('editDataForm'),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
     * Gestisce l'aggiornamento del record.
     *
     * @param Model $record Il record da aggiornare
     * @param array<string, mixed> $data I dati per l'aggiornamento
     * @return Model Il record aggiornato
     */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        return $record;
    }
}
