<?php
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
declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Filament\Schemas\Schema;
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Schema;
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Filament\Schemas\Schema;
use Override;
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 *
<<<<<<< HEAD
=======
=======
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\ComponentContainer;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * LoginWidget: Widget di login conforme alle regole Windsurf/Xot.
 * - Estende XotBaseWidget
 * - Usa solo componenti Filament importati
 * - Validazione e sicurezza integrate
 * - Facilmente estendibile (2FA, captcha, login social)
 *
 * @property array<string, mixed>|null $data
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property Schema $form
 */
class LoginWidget extends XotBaseWidget
{
    public null|array $data = [];
<<<<<<< HEAD
=======
=======
 * @property \Filament\Schemas\Schema $form
=======
 * @property ComponentContainer $form
>>>>>>> origin/develop
 */
class LoginWidget extends XotBaseWidget
{
    public ?array $data = [];
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
 * @property Schema $form
 */
class LoginWidget extends XotBaseWidget
{
    public null|array $data = [];
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Blade view del widget nel modulo User.
     * IMPORTANTE: quando il widget viene usato con @livewire() direttamente nelle Blade,
     * il path deve essere senza il namespace del modulo (senza "user::").
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     *
     * @see \Modules\User\docs\WIDGETS_STRUCTURE.md - Sezione B
     * @var view-string
     * @phpstan-ignore property.defaultValue
     */
    protected string $view = 'pub_theme::filament.widgets.auth.login';

    #[Override]
    public function getFormSchema(): array
    {
        return [
            TextInput::make('email')->email()->required(),
            TextInput::make('password')->password()->required(),
            Checkbox::make('remember'),
<<<<<<< HEAD
=======
=======
     * 
=======
     *
>>>>>>> b93ef594b4 (.)
     * @see \Modules\User\docs\WIDGETS_STRUCTURE.md - Sezione B
     * @var view-string
     * @phpstan-ignore property.defaultValue
     */
    protected string $view = 'pub_theme::filament.widgets.auth.login';

    #[Override]
    public function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
            TextInput::make('email')
                ->email()
                ->required(),

            TextInput::make('password')
                ->password()
                ->required(),

            Checkbox::make('remember')
                ,
>>>>>>> a12f125f4a (.)
=======
            TextInput::make('email')->email()->required(),
            TextInput::make('password')->password()->required(),
            Checkbox::make('remember'),
>>>>>>> b93ef594b4 (.)
=======
     * 
     * @see \Modules\User\docs\WIDGETS_STRUCTURE.md - Sezione B
     * @var view-string
     * @phpstan-ignore property.defaultValue 
     */
    protected static string $view = 'pub_theme::filament.widgets.auth.login';

    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('email')
                ->email()
                ->required(),

            Forms\Components\TextInput::make('password')
                ->password()
                ->required(),

            Forms\Components\Checkbox::make('remember')
                ,
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    public function login(): void
    {
        $data = $this->form->getState();

        $credentials = [
            'email' => is_string($data['email'] ?? null) ? $data['email'] : '',
            'password' => is_string($data['password'] ?? null) ? $data['password'] : '',
        ];
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
        if (Auth::attempt($credentials)) {
            session()->regenerate();
            redirect()->intended('/');
        }

        $this->addError('email', __('auth.failed'));
    }
}
