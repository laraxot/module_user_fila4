<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

class RegistrationWidget extends XotBaseWidget
{
    public null|array $data = [];
    protected int|string|array $columnSpan = 'full';
<<<<<<< HEAD
=======
=======
=======
use Override;
>>>>>>> b93ef594b4 (.)
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
use Filament\Actions\Concerns\InteractsWithRecord;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Widgets\Widget;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

class RegistrationWidget extends XotBaseWidget
{
<<<<<<< HEAD
    
    public ?array $data = [];
    protected int | string | array $columnSpan = 'full';
>>>>>>> a12f125f4a (.)
=======
    public null|array $data = [];
    protected int|string|array $columnSpan = 'full';
>>>>>>> b93ef594b4 (.)
=======
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
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public string $type;
    public string $resource;
    public string $model;
    public string $action;
    public Model $record;
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
     * @phpstan-var class-string
     * @phpstan-ignore-next-line
     */
<<<<<<< HEAD
    protected string $view = 'pub_theme::filament.widgets.registration';

    public function mount(string $type, Request $_request): void
=======
<<<<<<< HEAD
    protected string $view = 'pub_theme::filament.widgets.registration';

<<<<<<< HEAD
<<<<<<< HEAD
    public function mount(string $type, Request $_request): void
=======
    public function mount(string $type, Request $request): void
>>>>>>> a12f125f4a (.)
=======
    public function mount(string $type, Request $_request): void
>>>>>>> b93ef594b4 (.)
=======
    protected static string $view = 'pub_theme::filament.widgets.registration';

    public function mount(string $type, Request $request): void
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);
        $this->model = $this->resource::getModel();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        $this->action = Str::of($this->model)
            ->replace('\\Models\\', '\\Actions\\')
            ->append('\\RegisterAction')
            ->toString();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $record = $this->getFormModel();
        $data = $this->getFormFill();
        $this->data = $data;
        $this->form->fill($data);
        $this->form->model($record);
        $this->record = $record;
    }

    #[Override]
    public function getFormModel(): Model
    {
<<<<<<< HEAD
=======
=======
        $this->action = Str::of($this->model)->replace('\\Models\\', '\\Actions\\')->append('\\RegisterAction')->toString();
=======
>>>>>>> b93ef594b4 (.)
        $record = $this->getFormModel();
        $data = $this->getFormFill();
        $this->data = $data;
        $this->form->fill($data);
        $this->form->model($record);
        $this->record = $record;
    }

    #[Override]
    public function getFormModel(): Model
    {
<<<<<<< HEAD
       
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
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
       
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $data = request()->all();
        $email = Arr::get($data, 'email');
        $token = Arr::get($data, 'token');

        $user = $this->model::firstWhere('email', $email);
        if ($user === null) {
            return app($this->model);
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
        $remember_token = $user->remember_token;
        if ($remember_token === null) {
            $user->remember_token = Str::uuid()->toString();
            $user->save();
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
        if ($remember_token === $token) {
            $this->record = $user;
            return $user;
        }
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        return app($this->model);
    }

    #[Override]
    public function getFormFill(): array
    {
        $data = parent::getFormFill();
        $data['type'] = $this->type;

        return $data;
    }

    #[Override]
<<<<<<< HEAD
=======
=======
        
=======

>>>>>>> b93ef594b4 (.)
        return app($this->model);
    }

    #[Override]
    public function getFormFill(): array
    {
        $data = parent::getFormFill();
        $data['type'] = $this->type;

        return $data;
    }

<<<<<<< HEAD
   

>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
        
        return app($this->model);
    }

    public function getFormFill(): array{
        $data=parent::getFormFill();
        $data['type']=$this->type;
        
        return $data;
    }

   

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getFormSchema(): array
    {
        return $this->resource::getFormSchemaWidget();
    }

    /**
     * @see https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component
     */
<<<<<<< HEAD
    public function register(): RedirectResponse|Redirector
    {
=======
<<<<<<< HEAD
    public function register(): RedirectResponse|Redirector
    {
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $lang = app()->getLocale();

        $data = $this->form->getState();

        $data = array_merge($this->data ?? [], $data);
        $record = $this->record;

        $user = app($this->action)->execute($record, $data);

        $lang = app()->getLocale();
        $route = route('pages.view', ['slug' => $this->type . '_register_complete']);
        $route = LaravelLocalization::localizeUrl($route, $lang);

        //return redirect()->route('pages.view', ['slug' => $this->type . '_register_complete','lang'=>$lang]);
        return redirect($route);
    }
<<<<<<< HEAD
=======
=======
        $lang=app()->getLocale();
        
=======
        $lang = app()->getLocale();

>>>>>>> b93ef594b4 (.)
        $data = $this->form->getState();

        $data = array_merge($this->data ?? [], $data);
        $record = $this->record;

        $user = app($this->action)->execute($record, $data);

        $lang = app()->getLocale();
        $route = route('pages.view', ['slug' => $this->type . '_register_complete']);
        $route = LaravelLocalization::localizeUrl($route, $lang);

        //return redirect()->route('pages.view', ['slug' => $this->type . '_register_complete','lang'=>$lang]);
        return redirect($route);
    }
<<<<<<< HEAD

    
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    public function register(): \Illuminate\Http\RedirectResponse|\Livewire\Features\SupportRedirects\Redirector
    {
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

    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
