<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

<<<<<<< HEAD
use Filament\Schemas\Schema;
=======
<<<<<<< HEAD
use Filament\Schemas\Schema;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\RegisterTenant as BaseRegisterTenant;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\User\Contracts\TenantContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Traits\TransTrait;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
=======
=======
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\XotData;
=======
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\RegisterTenant as BaseRegisterTenant;
>>>>>>> b93ef594b4 (.)
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\User\Contracts\TenantContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Traits\TransTrait;
<<<<<<< HEAD
use Filament\Pages\Tenancy\RegisterTenant as BaseRegisterTenant;
>>>>>>> a12f125f4a (.)
=======
use Webmozart\Assert\Assert;
>>>>>>> b93ef594b4 (.)
=======
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\XotData;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Modules\User\Contracts\TenantContract;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Pages\Tenancy\RegisterTenant as BaseRegisterTenant;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class RegisterTenant extends BaseRegisterTenant
{
    use TransTrait;

    public string $resource;

    public static function getLabel(): string
    {
        $tenantClass = XotData::make()->getTenantClass();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $func = Str::of(__FUNCTION__)->snake()->toString();
        if (Str::startsWith($func, 'get_')) {
            $func = Str::of($func)->after('get_')->toString();
        }
        $key = Str::of(class_basename(__CLASS__))
            ->snake()
            ->prepend('actions.')
            ->append('.' . $func)
            ->toString();
        $str = static::transClass($tenantClass, $key);
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $func=Str::of(__FUNCTION__)->snake()->toString();
        if(Str::startsWith($func,'get_')){
            $func=Str::of($func)->after('get_')->toString();
        }
        $key=Str::of(class_basename(__CLASS__))->snake()->prepend('actions.')->append('.'.$func)->toString();
        $str= static::transClass($tenantClass,$key);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $func = Str::of(__FUNCTION__)->snake()->toString();
        if (Str::startsWith($func, 'get_')) {
            $func = Str::of($func)->after('get_')->toString();
        }
        $key = Str::of(class_basename(__CLASS__))
            ->snake()
            ->prepend('actions.')
            ->append('.' . $func)
            ->toString();
        $str = static::transClass($tenantClass, $key);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        return $str;
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    public function form(Schema $schema): Schema
    {
        $tenantClass = XotData::make()->getTenantClass();
        $resource = Str::of($tenantClass)
            ->replace('\Models\\', '\Filament\Resources\\')
            ->append('Resource')
            ->toString();
        $this->resource = $resource;
        return $schema->components($this->getFormSchema());
<<<<<<< HEAD
=======
=======


=======
>>>>>>> b93ef594b4 (.)
    public function form(Schema $schema): Schema
    {
        $tenantClass = XotData::make()->getTenantClass();
        $resource = Str::of($tenantClass)
            ->replace('\Models\\', '\Filament\Resources\\')
            ->append('Resource')
            ->toString();
<<<<<<< HEAD
        $this->resource=$resource;
        return $schema
            ->components($this->getFormSchema());
>>>>>>> a12f125f4a (.)
=======
        $this->resource = $resource;
        return $schema->components($this->getFormSchema());
>>>>>>> b93ef594b4 (.)
=======


    public function form(Form $form): Form
    {
        $tenantClass = XotData::make()->getTenantClass();
        $resource=Str::of($tenantClass)
            ->replace('\Models\\','\Filament\Resources\\')
            ->append('Resource')
            ->toString();
        $this->resource=$resource;
        return $form
            ->schema($this->getFormSchema());
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function getFormSchema(): array
    {
        return $this->resource::getFormSchema();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    protected function handleRegistration(array $data): Model
    {
        $tenantClass = XotData::make()->getTenantClass();

        $tenant = $tenantClass::create($data);
        Assert::implementsInterface($tenant, TenantContract::class);

<<<<<<< HEAD
        $tenant->users()->attach(auth()->user());
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $tenant->users()->attach(auth()->user());
=======
        $tenant->users()
            ->attach(auth()->user());
>>>>>>> a12f125f4a (.)
=======
        $tenant->users()->attach(auth()->user());
>>>>>>> b93ef594b4 (.)
=======
        $tenant->users()
            ->attach(auth()->user());
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        return $tenant;
    }
}
