<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
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
=======
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> b93ef594b4 (.)
use Illuminate\Database\Eloquent\Model;
use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form as FilamentForm;
use Filament\Notifications\Notification;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
>>>>>>> b93ef594b4 (.)
=======
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form as FilamentForm;
use Filament\Notifications\Notification;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
     *
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> a12f125f4a (.)
=======
     *
>>>>>>> b93ef594b4 (.)
=======
     * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @see \Modules\User\docs\WIDGETS_STRUCTURE.md - Sezione B
     * @var view-string
     */
    /** @phpstan-ignore-next-line property.defaultValue */
<<<<<<< HEAD
    protected string $view = 'pub_theme::filament.widgets.auth.login';

=======
<<<<<<< HEAD
    protected string $view = 'pub_theme::filament.widgets.auth.login';
<<<<<<< HEAD
<<<<<<< HEAD

=======
    
   
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
    protected static string $view = 'pub_theme::filament.widgets.auth.login';
    
   
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    /**
     * Get the form schema for the login form.
     *
     * @return array<int, Component>
     */
    #[Override]
<<<<<<< HEAD
=======
=======
    
=======

>>>>>>> b93ef594b4 (.)
    /**
     * Get the form schema for the login form.
     *
     * @return array<int, Component>
     */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
    
    /**
     * Get the form schema for the login form.
     *
     * @return array<int, \Filament\Forms\Components\Component>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
            Toggle::make('remember')->visible(false),
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            Toggle::make('remember')->visible(false),
=======
            Toggle::make('remember')
                ->visible(false),
>>>>>>> a12f125f4a (.)
=======
            Toggle::make('remember')->visible(false),
>>>>>>> b93ef594b4 (.)
=======
            Toggle::make('remember')
                ->visible(false),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
     * Get the form model.
     *
<<<<<<< HEAD
     * @return Model|null
     */
=======
<<<<<<< HEAD
     * @return Model|null
     */
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    protected function getFormModel(): null|Model
    {
        return null;
    }

<<<<<<< HEAD
=======
=======
    protected function getFormModel(): ?Model
=======
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    protected function getFormModel(): ?\Illuminate\Database\Eloquent\Model
>>>>>>> origin/develop
    {
        return null;
    }
    
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    protected function getFormModel(): null|Model
    {
        return null;
    }

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    /**
     * Get the form fill data.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getFormFill(): array
    {
        return [
            'email' => old('email'),
            'remember' => true,
        ];
    }

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
    /**
     * Handle login form submission.
     *
     * @return void
     */
<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function save(): void
    {
        try {
            $data = $this->form->getState();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

            // Cast esplicito per type safety PHPStan
            $remember = (bool) ($data['remember'] ?? false);
            $attempt_data = Arr::only($data, ['email', 'password']);

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
            
            // Cast esplicito per type safety PHPStan
            $remember = (bool) ($data['remember'] ?? false);
            $attempt_data =Arr::only($data,['email','password']);
            
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

            // Cast esplicito per type safety PHPStan
            $remember = (bool) ($data['remember'] ?? false);
            $attempt_data = Arr::only($data, ['email', 'password']);

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            if (!Auth::attempt($attempt_data, $remember)) {
                throw ValidationException::withMessages([
                    'email' => [__('user::messages.credentials_incorrect')],
                ]);
            }

            session()->regenerate();
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
            Notification::make()
                ->title(__('user::messages.login_success'))
                ->success()
                ->send();
<<<<<<< HEAD

            $this->redirect(route('home'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

            $this->redirect(route('home'));
=======
                
            $this->redirect(route('home'));
            
>>>>>>> a12f125f4a (.)
=======

            $this->redirect(route('home'));
>>>>>>> b93ef594b4 (.)
=======
                
            $this->redirect(route('home'));
            
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        } catch (ValidationException $e) {
            Notification::make()
                ->title(__('user::messages.validation_error'))
                ->body($e->getMessage())
                ->danger()
                ->send();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

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
=======
                
=======

>>>>>>> b93ef594b4 (.)
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
            
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
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
            
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            Notification::make()
                ->title(__('user::messages.login_error'))
                ->body(__('user::messages.login_error'))
                ->danger()
                ->send();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

            $this->form->fill();
            $this->form->saveRelationships();
            //$this->form->callAfter();

            $this->addError('email', __('user::messages.login_error'));
        }
    }
<<<<<<< HEAD
=======
=======
                
=======

>>>>>>> b93ef594b4 (.)
            $this->form->fill();
            $this->form->saveRelationships();
            //$this->form->callAfter();

            $this->addError('email', __('user::messages.login_error'));
        }
    }
<<<<<<< HEAD
    

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
                
            $this->form->fill();
            $this->form->saveRelationships();
            //$this->form->callAfter();
            
            $this->addError('email', __('user::messages.login_error'));
        }
    }
    

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
