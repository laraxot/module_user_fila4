<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

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

    public string $type;

    public string $resource;

    public string $model;

    public string $action;

    public Model $record;

    /**
     * @phpstan-var class-string
     *
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.registration';

    public function mount(string $type, Request $_request): void
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);

        $modelClass = $this->resource::getModel();
        $this->model = is_string($modelClass) ? $modelClass : '';

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

        // PHPStan Level 10: Uso getAttribute() per evitare undefined property error
        /** @var string|null $remember_token */
        $remember_token = $user->getAttribute('remember_token');
        if ($remember_token === null && $user->isFillable('remember_token')) {
            $user->setAttribute('remember_token', Str::uuid()->toString());
            $user->save();
            $remember_token = $user->getAttribute('remember_token');
        }

        if ($remember_token === $token) {
            $this->record = $user;

            return $user;
        }

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
}
