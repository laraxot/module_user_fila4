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
        $this->model = (string) $this->resource::getModel();
        $this->action = Str::of($this->model)
            ->replace('\\Models\\', '\\Actions\\')
            ->append('\\RegisterAction')
            ->toString();
        $record = $this->getFormModel();
        $data = $this->getFormFill();
        Assert::isArray($data);
        /** @var array<string, mixed> $typedData */
        $typedData = $data;
        $this->data = $typedData;
        $this->form->fill($typedData);
        $this->form->model($record);
        $this->record = $record;
    }

    #[\Override]
    public function getFormModel(): Model
    {
        $data = request()->all();
        $email = Arr::get($data, 'email');
        $token = Arr::get($data, 'token');

        $user = $this->model::firstWhere('email', $email);
        if ($user === null) {
            $model = app($this->model);
            Assert::isInstanceOf($model, Model::class);

            return $model;
        }

        Assert::isInstanceOf($user, Model::class);
        $remember_token = $user->getAttribute('remember_token');
        if ($remember_token === null) {
            $user->setAttribute('remember_token', Str::uuid()->toString());
            $user->save();
        }

        if ($remember_token === $token) {
            $this->record = $user;

            return $user;
        }

        $model = app($this->model);
        Assert::isInstanceOf($model, Model::class);

        return $model;
    }

    #[\Override]
    /**
     * @return array<string, mixed>
     */
    public function getFormFill(): array
    {
        $data = parent::getFormFill();
        $data['type'] = $this->type;

        return $data;
    }

    #[\Override]
    /**
     * @return array<string, mixed>
     */
    public function getFormSchema(): array
    {
        $schema = $this->resource::getFormSchemaWidget();
        Assert::isArray($schema);

        /** @var array<int|string, \Filament\Schemas\Components\Component> $result */
        $result = $schema;

        return $result;
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

        $action = app($this->action);
        Assert::object($action);
        if (! method_exists($action, 'execute')) {
            throw new \RuntimeException('Action must have execute method');
        }
        $user = $action->execute($record, $data);

        $lang = app()->getLocale();
        $route = route('pages.view', ['slug' => $this->type.'_register_complete']);
        $route = LaravelLocalization::localizeUrl($route, $lang);

        // return redirect()->route('pages.view', ['slug' => $this->type . '_register_complete','lang'=>$lang]);
        return redirect($route);
    }
}
