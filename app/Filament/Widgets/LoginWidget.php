<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
use Filament\Schemas\Components\Component;
use Override;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form as FilamentForm;
use Filament\Notifications\Notification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form as FilamentForm;
use Filament\Notifications\Notification;
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
use Illuminate\Validation\ValidationException;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * LoginWidget: Widget di login conforme alle regole Windsurf/Xot.
 * - Estende XotBaseWidget
 * - Usa solo componenti Filament importati
 * - Validazione e sicurezza integrate
 * - Facilmente estendibile (2FA, captcha, login social)
 *
 * @property array<string, mixed>|null $data
 */
class LoginWidget extends XotBaseWidget
{
    /**
     * Blade view del widget nel modulo User.
     * IMPORTANTE: quando il widget viene usato con @livewire() direttamente nelle Blade,
     * il path deve essere senza il namespace del modulo (senza "user::").
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> fbc8f8e (.)
=======
     *
>>>>>>> 6d20fbe (.)
     * @see \Modules\User\docs\WIDGETS_STRUCTURE.md - Sezione B
     * @var view-string
     */
    /** @phpstan-ignore-next-line property.defaultValue */
    protected string $view = 'pub_theme::filament.widgets.auth.login';
<<<<<<< HEAD
<<<<<<< HEAD

=======
    
   
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
    /**
     * Inizializza il widget quando viene montato.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->form->fill();
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

    /**
     * Get the form schema for the login form.
     *
     * @return array<int, Component>
     */
    #[Override]
<<<<<<< HEAD
=======
    
    /**
     * Get the form schema for the login form.
     *
     * @return array<int, \Filament\Schemas\Components\Component>
     */
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
            Toggle::make('remember')->visible(false),
=======
            Toggle::make('remember')
                ->visible(false),
>>>>>>> fbc8f8e (.)
=======
            Toggle::make('remember')->visible(false),
>>>>>>> 6d20fbe (.)
        ];
    }

    /**
     * Get the form model.
     *
     * @return Model|null
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    #[Override]
    protected function getFormModel(): null|Model
    {
        return null;
    }

<<<<<<< HEAD
=======
    protected function getFormModel(): ?Model
    {
        return null;
    }
    
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    /**
     * Get the form fill data.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> fbc8f8e (.)
=======
    #[Override]
>>>>>>> 6d20fbe (.)
    public function getFormFill(): array
    {
        return [
            'email' => old('email'),
            'remember' => true,
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======


>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    /**
     * Handle login form submission.
     *
     * @return void
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> fbc8f8e (.)
=======
    #[Override]
>>>>>>> 6d20fbe (.)
    public function save(): void
    {
        try {
            $data = $this->form->getState();
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

            // Cast esplicito per type safety PHPStan
            $remember = (bool) ($data['remember'] ?? false);
            $attempt_data = Arr::only($data, ['email', 'password']);

<<<<<<< HEAD
=======
            
            // Cast esplicito per type safety PHPStan
            $remember = (bool) ($data['remember'] ?? false);
            $attempt_data =Arr::only($data,['email','password']);
            
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            if (!Auth::attempt($attempt_data, $remember)) {
                throw ValidationException::withMessages([
                    'email' => [__('user::messages.credentials_incorrect')],
                ]);
            }

            session()->regenerate();
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
            Notification::make()
                ->title(__('user::messages.login_success'))
                ->success()
                ->send();
<<<<<<< HEAD
<<<<<<< HEAD

            $this->redirect(route('home'));
=======
                
            $this->redirect(route('home'));
            
>>>>>>> fbc8f8e (.)
=======

            $this->redirect(route('home'));
>>>>>>> 6d20fbe (.)
        } catch (ValidationException $e) {
            Notification::make()
                ->title(__('user::messages.validation_error'))
                ->body($e->getMessage())
                ->danger()
                ->send();
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

            $this->form->fill();
            $this->form->saveRelationships();
            //$this->form->callAfter();

            foreach ($e->errors() as $field => $messages) {
                // Semplificato: aggiungi sempre l'errore al campo specifico
                $this->addError($field, implode(' ', $messages));
            }
        } catch (Exception $e) {
            report($e);

<<<<<<< HEAD
=======
                
            $this->form->fill();
            $this->form->saveRelationships();
            //$this->form->callAfter();
            
            foreach ($e->errors() as $field => $messages) {
                $this->form->getComponent($field)?->getContainer()->getParentComponent()?->getStatePath()
                    ? $this->addError($field, implode(' ', $messages))
                    : $this->addError('email', implode(' ', $messages));
            }
            
        } catch (Exception $e) {
            report($e);
            
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            Notification::make()
                ->title(__('user::messages.login_error'))
                ->body(__('user::messages.login_error'))
                ->danger()
                ->send();
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

            $this->form->fill();
            $this->form->saveRelationships();
            //$this->form->callAfter();

            $this->addError('email', __('user::messages.login_error'));
        }
    }
<<<<<<< HEAD
=======
                
            $this->form->fill();
            $this->form->saveRelationships();
            //$this->form->callAfter();
            
            $this->addError('email', __('user::messages.login_error'));
        }
    }
    

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
}
