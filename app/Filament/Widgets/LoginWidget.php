<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> laraxot/develop
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
<<<<<<< HEAD
=======
use Filament\Schemas\Schema;
>>>>>>> laraxot/develop
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
<<<<<<< HEAD
use Override;
=======
>>>>>>> laraxot/develop

/**
 * LoginWidget: Widget di login conforme alle regole Windsurf/Xot.
 * - Estende XotBaseWidget
 * - Usa solo componenti Filament importati
 * - Validazione e sicurezza integrate
<<<<<<< HEAD
 * - Facilmente estendibile (2FA, captcha, login social)
=======
 * - Facilmente estendibile (2FA, captcha, login social).
>>>>>>> laraxot/develop
 *
 * @property array<string, mixed>|null $data
 */
class LoginWidget extends XotBaseWidget
{
    /**
     * Blade view del widget nel modulo User.
     * IMPORTANTE: quando il widget viene usato con @livewire() direttamente nelle Blade,
     * il path deve essere senza il namespace del modulo (senza "user::").
     *
     * @see \Modules\User\docs\WIDGETS_STRUCTURE.md - Sezione B
     *
     * @var view-string
     */
    /** @phpstan-ignore-next-line property.defaultValue */
    protected string $view = 'pub_theme::filament.widgets.auth.login';

    /**
     * Inizializza il widget quando viene montato.
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Get the form schema for the login form.
     *
     * @return array<int, Component>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 220cf97b (.)
=======
    #[\Override]
>>>>>>> laraxot/develop
    public function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->email()
                ->required()
                ->autofocus(),
            TextInput::make('password')
                ->password()
                ->required()
                ->revealable(),
            Toggle::make('remember')->visible(false),
        ];
    }

    /**
<<<<<<< HEAD
=======
     * Get the form model.
     */
    #[\Override]
    protected function getFormModel(): ?Model
    {
        return null;
    }

    /**
>>>>>>> laraxot/develop
     * Get the form fill data.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 220cf97b (.)
=======
    #[\Override]
>>>>>>> laraxot/develop
    public function getFormFill(): array
    {
        return [
            'email' => old('email'),
            'remember' => true,
        ];
    }

    /**
     * Handle login form submission.
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> laraxot/develop
    public function save(): void
    {
        try {
            $data = $this->form->getState();

            // Cast esplicito per type safety PHPStan
            $remember = (bool) ($data['remember'] ?? false);
            $attempt_data = Arr::only($data, ['email', 'password']);

            if (! Auth::attempt($attempt_data, $remember)) {
<<<<<<< HEAD
                throw ValidationException::withMessages([
                    'email' => [__('user::messages.credentials_incorrect')],
                ]);
=======
                throw ValidationException::withMessages(['email' => [__('user::messages.credentials_incorrect')]]);
>>>>>>> laraxot/develop
            }

            session()->regenerate();

            Notification::make()
                ->title(__('user::messages.login_success'))
                ->success()
                ->send();

            $this->redirect(route('home'));
        } catch (ValidationException $e) {
            Notification::make()
                ->title(__('user::messages.validation_error'))
                ->body($e->getMessage())
                ->danger()
                ->send();

            $this->form->fill();
            $this->form->saveRelationships();
            // $this->form->callAfter();

            foreach ($e->errors() as $field => $messages) {
<<<<<<< HEAD
                // PHPStan Level 10: Ensure messages is array
                if (! is_array($messages)) {
                    $messages = [$messages];
                }

<<<<<<< HEAD
                /** @var array<int|string, mixed> $messages */
=======
                /* @var array<int|string, mixed> $messages */
>>>>>>> 220cf97b (.)
                $this->addError($field, implode(' ', $messages));
            }
        } catch (Exception $e) {
=======
                // Semplificato: aggiungi sempre l'errore al campo specifico
                if (! \is_array($messages)) {
                    /** @var array<int, string> $messages */
                    $messages = [$messages];
                } else {
                    /* @var array<int, string> $messages */
                }
                $this->addError($field, implode(' ', $messages));
            }
        } catch (\Exception $e) {
>>>>>>> laraxot/develop
            report($e);

            Notification::make()
                ->title(__('user::messages.login_error'))
                ->body(__('user::messages.login_error'))
                ->danger()
                ->send();

            $this->form->fill();
            $this->form->saveRelationships();
            // $this->form->callAfter();

            $this->addError('email', __('user::messages.login_error'));
        }
    }
<<<<<<< HEAD

    /**
     * Get the form model.
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 220cf97b (.)
    protected function getFormModel(): ?Model
    {
        return null;
    }
=======
>>>>>>> laraxot/develop
}
