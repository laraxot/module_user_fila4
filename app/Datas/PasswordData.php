<?php

/**
 * Classe per la gestione delle configurazioni delle password.
 */

declare(strict_types=1);

namespace Modules\User\Datas;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use RuntimeException;
use InvalidArgumentException;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Filament\Forms\Components\TextInput as FilamentTextInput;
use Filament\Forms\Components\TextInput as FormsTextInput;
=======
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\TextInput as FilamentTextInput;
use Filament\Forms\Components\TextInput as FormsTextInput;
=======
>>>>>>> a12f125f4a (.)
=======
use Filament\Forms\Components\TextInput as FilamentTextInput;
use Filament\Forms\Components\TextInput as FormsTextInput;
>>>>>>> b93ef594b4 (.)
=======
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms\Get;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Validation\Rules\Password;
use Modules\Tenant\Services\TenantService;
use Spatie\LaravelData\Data;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Forms\Components\TextInput as FilamentTextInput;
use Filament\Forms\Components\TextInput as FormsTextInput;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
use Filament\Forms\Components\TextInput as FilamentTextInput;
use Filament\Forms\Components\TextInput as FormsTextInput;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

/**
 * Classe per la gestione dei dati relativi alle password.
 */
class PasswordData extends Data
{
    public function __construct(
        public int $otp_expiration_minutes = 5,
        public int $otp_length = 6,
        public int $expires_in = 60,
        public int $min = 8,
        public bool $mixedCase = true,
        public bool $letters = true,
        public bool $numbers = true,
        public bool $symbols = true,
        public bool $uncompromised = true,
        public int $compromisedThreshold = 0,
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        public null|string $failMessage = null,
        private null|string $field_name = null,
    ) {}

    private static null|self $instance = null;
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        public ?string $failMessage = null,
        private ?string $field_name = null,
    ) {
    }

    private static ?self $instance = null;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        public null|string $failMessage = null,
        private null|string $field_name = null,
    ) {}

    private static null|self $instance = null;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Crea un'istanza della classe PasswordData.
     *
     * @return self
     */
    public static function make(): self
    {
<<<<<<< HEAD
        if (!self::$instance) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (!self::$instance) {
=======
        if (! self::$instance) {
>>>>>>> a12f125f4a (.)
=======
        if (!self::$instance) {
>>>>>>> b93ef594b4 (.)
=======
        if (! self::$instance) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            /** @var array<string, mixed> $data */
            $data = TenantService::getConfig('password');
            self::$instance = self::from($data);
        }

        return self::$instance;
    }

    /**
     * Get the password validation rule.
     */
    public function getPasswordRule(): Password
    {
        $pwd = Password::min($this->min);

        if ($this->mixedCase) {
            $pwd = $pwd->mixedCase();
        }
        if ($this->letters) {
            $pwd = $pwd->letters();
        }
        if ($this->numbers) {
            $pwd = $pwd->numbers();
        }
        if ($this->symbols) {
            $pwd = $pwd->symbols();
        }
        if ($this->uncompromised) {
            $pwd = $pwd->uncompromised($this->compromisedThreshold);
        }

        return $pwd;
    }

    /**
     * Get the validation messages.
     *
     * @return array<string, string>
     */
    public function getValidationMessages(): array
    {
        return [
            'required' => __('user::validation.required'),
            'same' => __('user::validation.same'),
        ];
    }

    /**
     * Get the helper text.
     */
    public function getHelperText(): string
    {
<<<<<<< HEAD
        $msg = 'La password deve essere composta da minimo ' . $this->min . ' caratteri';
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $msg = 'La password deve essere composta da minimo ' . $this->min . ' caratteri';
=======
        $msg = 'La password deve essere composta da minimo '.$this->min.' caratteri';
>>>>>>> a12f125f4a (.)
=======
        $msg = 'La password deve essere composta da minimo ' . $this->min . ' caratteri';
>>>>>>> b93ef594b4 (.)
=======
        $msg = 'La password deve essere composta da minimo '.$this->min.' caratteri';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        if ($this->mixedCase) {
            $msg .= ', contenere almeno una lettera maiuscola e una minuscola';
        }

        if ($this->letters) {
            $msg .= ', contenere almeno una lettera';
        }

        if ($this->numbers) {
            $msg .= ', contenere almeno un numero';
        }

        if ($this->symbols) {
            $msg .= ', contenere almeno un carattere speciale';
        }

        if ($this->uncompromised) {
            $msg .= ', non essere stata compromessa in precedenti violazioni di dati';
        }

        return $msg;
    }

    /**
     * Set the field name.
     */
    public function setFieldName(string $field_name): self
    {
        $this->field_name = $field_name;
        return $this;
    }

    /**
     * Get the password form component.
     */
    public function getPasswordFormComponent(string $field_name): TextInput
    {
        return TextInput::make($field_name)
            ->password()
            ->required()
            ->label(__('Password'))
            ->placeholder(__('Inserisci la tua password'))
            ->validationMessages($this->getValidationMessages())
            ->helperText($this->getHelperText());
    }

    /**
     * Get the password confirmation form component.
     */
    public function getPasswordConfirmationFormComponent(): TextInput
    {
        if ($this->field_name === null) {
<<<<<<< HEAD
            throw new RuntimeException(
                'Il nome del campo password non è stato impostato. Utilizzare setFieldName() prima di chiamare questo metodo.',
            );
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            throw new RuntimeException(
                'Il nome del campo password non è stato impostato. Utilizzare setFieldName() prima di chiamare questo metodo.',
            );
=======
            throw new RuntimeException('Il nome del campo password non è stato impostato. Utilizzare setFieldName() prima di chiamare questo metodo.');
>>>>>>> a12f125f4a (.)
=======
            throw new RuntimeException(
                'Il nome del campo password non è stato impostato. Utilizzare setFieldName() prima di chiamare questo metodo.',
            );
>>>>>>> b93ef594b4 (.)
=======
            throw new \RuntimeException('Il nome del campo password non è stato impostato. Utilizzare setFieldName() prima di chiamare questo metodo.');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        return TextInput::make('password_confirmation')
            ->password()
            ->required()
            ->label(__('Conferma Password'))
            ->placeholder(__('Conferma la tua password'))
            ->same($this->field_name)
            ->validationMessages($this->getValidationMessages());
    }

    /**
     * Get both password form components.
     *
     * @return array<TextInput>
     */
    public function getPasswordFormComponents(string $field_name): array
    {
        if (empty($field_name)) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            throw new InvalidArgumentException('Il nome del campo password non può essere vuoto');
        }

        $this->setFieldName($field_name);
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
            throw new \InvalidArgumentException('Il nome del campo password non può essere vuoto');
        }

        $this->setFieldName($field_name);
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        return [
            $this->getPasswordFormComponent($field_name),
            $this->getPasswordConfirmationFormComponent(),
        ];
    }

    public static function getFormSchema(): array
    {
        return [
            'password' => FormsTextInput::make('password')
                ->password()
                ->required()
                ->minLength(8)
                ->maxLength(255),
            'password_confirmation' => FormsTextInput::make('password_confirmation')
                ->password()
                ->required()
                ->minLength(8)
                ->maxLength(255),
        ];
    }
}
