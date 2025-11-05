<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
=======
<<<<<<< HEAD
use Override;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
use Filament\Actions\Concerns\InteractsWithRecord;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Widgets\Widget;
use Illuminate\Auth\Events\Registered;
>>>>>>> 3753a57 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Features\SupportRedirects\Redirector;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Override;

class RegistrationWidget extends XotBaseWidget
{
    public ?array $data = [];

    protected int|string|array $columnSpan = 'full';
<<<<<<< HEAD

=======
=======
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
use Filament\Forms\Form;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Filament\Widgets\Widget;
use Illuminate\Http\Request;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\XotData;
use Livewire\Attributes\Validate;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Auth\Events\Registered;
use Filament\Forms\Components\Checkbox;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Filament\Actions\Concerns\InteractsWithRecord;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class RegistrationWidget extends XotBaseWidget
{
    
    public ?array $data = [];
    protected int | string | array $columnSpan = 'full';
>>>>>>> fbc8f8e (.)
>>>>>>> 3753a57 (.)
    public string $type;

    public string $resource;

    public string $model;

    public string $action;

    public Model $record;
<<<<<<< HEAD

=======
    
>>>>>>> fbc8f8e (.)
    /**
     * @phpstan-var class-string
     *
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.registration';

<<<<<<< HEAD
    public function mount(string $type, Request $_request): void
=======
    public function mount(string $type, Request $request): void
>>>>>>> fbc8f8e (.)
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);
<<<<<<< HEAD

        $modelClass = $this->resource::getModel();
        $this->model = is_string($modelClass) ? $modelClass : '';

=======
        $this->model = $this->resource::getModel();
<<<<<<< HEAD
>>>>>>> 3753a57 (.)
        $this->action = Str::of($this->model)
            ->replace('\\Models\\', '\\Actions\\')
            ->append('\\RegisterAction')
            ->toString();
        $record = $this->getFormModel();
        $data = $this->getFormFill();

        /** @var array<string, mixed> $data */
        $this->data = $data;
        $this->form->fill($data);
        $this->form->model($record);
        $this->record = $record;
    }

    #[Override]
<<<<<<< HEAD
    protected function getFormModel(): Model
=======
    public function getFormModel(): Model
>>>>>>> 6849bc76 (.)
    {
=======
        $this->action = Str::of($this->model)->replace('\\Models\\', '\\Actions\\')->append('\\RegisterAction')->toString();
        $record = $this->getFormModel();
        $data = $this->getFormFill();
        $this->data = $data; 
        $this->form->fill($data);
        $this->form->model($record);
        $this->record = $record;
        
    }

    public function getFormModel(): Model
    {
       
>>>>>>> fbc8f8e (.)
        $data = request()->all();
        $email = Arr::get($data, 'email');
        $token = Arr::get($data, 'token');

        /** @var Model|null $user */
        $user = $this->model::firstWhere('email', $email);
        if ($user === null) {
            /** @var Model $model */
            $model = app($this->model);

            return $model;
        }
<<<<<<< HEAD

<<<<<<< HEAD
        // PHPStan Level 10: Uso getAttribute() per evitare undefined property error
        /** @var string|null $remember_token */
        $remember_token = $user->getAttribute('remember_token');
        if ($remember_token === null && $user->isFillable('remember_token')) {
            $user->setAttribute('remember_token', Str::uuid()->toString());
=======
=======
        
>>>>>>> fbc8f8e (.)
        $remember_token = $user->remember_token;
        if ($remember_token === null) {
            $user->remember_token = Str::uuid()->toString();
>>>>>>> 3753a57 (.)
            $user->save();
            $remember_token = $user->getAttribute('remember_token');
        }
<<<<<<< HEAD

=======
        
>>>>>>> fbc8f8e (.)
        if ($remember_token === $token) {
            $this->record = $user;

            return $user;
        }
<<<<<<< HEAD

        /** @var \Illuminate\Database\Eloquent\Model $modelInstance */
        $modelInstance = app($this->model);

        return $modelInstance;
    }

    #[Override]
    public function getFormFill(): array
    {
        $data = parent::getFormFill();
        $data['type'] = $this->type;

        return $data;
    }

    #[Override]
=======
        
        return app($this->model);
    }

    public function getFormFill(): array{
        $data=parent::getFormFill();
        $data['type']=$this->type;
        
        return $data;
    }

   

>>>>>>> fbc8f8e (.)
    public function getFormSchema(): array
    {
        /** @var array<int|string, \Filament\Schemas\Components\Component> $schema */
        $schema = $this->resource::getFormSchemaWidget();

        return $schema;
    }

    /**
     * @see https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component
     */
    public function register(): RedirectResponse|Redirector
    {
<<<<<<< HEAD
        $lang = app()->getLocale();

        $data = $this->form->getState();

        $data = array_merge($this->data ?? [], $data);
        $record = $this->record;

        /** @var object{execute: callable} $actionInstance */
        $actionInstance = app($this->action);

        /** @phpstan-ignore method.notFound */
        $user = $actionInstance->execute($record, $data);

        $lang = app()->getLocale();
        $route = route('pages.view', ['slug' => $this->type.'_register_complete']);
        $route = LaravelLocalization::localizeUrl($route, $lang);

        // return redirect()->route('pages.view', ['slug' => $this->type . '_register_complete','lang'=>$lang]);
        return redirect($route);
    }
=======
        $lang=app()->getLocale();
        
        $data = $this->form->getState();
        
        $data=array_merge($this->data ?? [],$data);
        $record = $this->record;
       
        $user = app($this->action)->execute($record, $data);

        $lang=app()->getLocale();
        $route=route('pages.view', ['slug' => $this->type . '_register_complete']);
        $route=LaravelLocalization::localizeUrl($route,$lang);
        
        //return redirect()->route('pages.view', ['slug' => $this->type . '_register_complete','lang'=>$lang]);
        return redirect($route);
    }

    
>>>>>>> fbc8f8e (.)
}
