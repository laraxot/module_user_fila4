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
use Webmozart\Assert\Assert;

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
        Assert::classExists($this->resource);
        $modelClass = $this->resource::getModel();
        Assert::string($modelClass);
        $this->model = $modelClass;
        Assert::string($this->model);
        $this->action = Str::of($this->model)
            ->replace('\\Models\\', '\\Actions\\')
            ->append('\\RegisterAction')
            ->toString();
        $record = $this->getFormModel();
        $data = $this->getFormFill();
        /* @var array<string, mixed> $data */
        $this->data = $data;
        $this->form->fill($data);
        $this->form->model($record);
        $this->record = $record;
    }

    #[\Override]
    public function getFormModel(): Model
    {
        Assert::classExists($this->model);
        /** @var class-string<Model> $modelClass */
        $modelClass = $this->model;

        $data = request()->all();
        $email = Arr::get($data, 'email');
        $token = Arr::get($data, 'token');

        $user = $modelClass::firstWhere('email', $email);
        if (null === $user) {
            $newModel = app($modelClass);
            Assert::isInstanceOf($newModel, Model::class);

            return $newModel;
        }
        Assert::isInstanceOf($user, Model::class);

        $remember_token = $user->getAttribute('remember_token');
        if (null === $remember_token) {
            $user->setAttribute('remember_token', Str::uuid()->toString());
            $user->save();
        }

        if ($remember_token === $token) {
            $this->record = $user;

            return $user;
        }

        Assert::classExists($this->model);
        /** @var class-string<Model> $modelClass */
        $modelClass = $this->model;
        $newModel = app($modelClass);
        Assert::isInstanceOf($newModel, Model::class);

        return $newModel;
    }

    #[\Override]
    public function getFormFill(): array
    {
        /** @var array<string, mixed> $data */
        $data = parent::getFormFill();
        $data['type'] = $this->type;

        return $data;
    }

    #[\Override]
    public function getFormSchema(): array
    {
        Assert::classExists($this->resource);
        $schema = $this->resource::getFormSchemaWidget();
        Assert::isArray($schema);
        /* @var array<int|string, \Filament\Schemas\Components\Component> $schema */

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

        Assert::classExists($this->action);
        $actionInstance = app($this->action);
        if (! \is_object($actionInstance)) {
            throw new \RuntimeException('Action instance must be an object');
        }
        if (! method_exists($actionInstance, 'execute')) {
            throw new \RuntimeException('Action instance must have execute method');
        }
        /** @var callable $execute */
        $execute = [$actionInstance, 'execute'];
        $user = $execute($record, $data);

        $lang = app()->getLocale();
        $route = route('pages.view', ['slug' => $this->type.'_register_complete']);
        $route = LaravelLocalization::localizeUrl($route, $lang);

        // return redirect()->route('pages.view', ['slug' => $this->type . '_register_complete','lang'=>$lang]);
        return redirect($route);
    }
}
