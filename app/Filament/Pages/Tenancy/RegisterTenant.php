<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Pages\Tenancy\RegisterTenant as BaseRegisterTenant;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\User\Contracts\TenantContract;
use Modules\User\Models\BaseTenant;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Traits\TransTrait;
use Webmozart\Assert\Assert;

class RegisterTenant extends BaseRegisterTenant
{
    use TransTrait;

    public string $resource;

    public static function getLabel(): string
    {
        $tenantClass = XotData::make()->getTenantClass();
        $func = Str::of(__FUNCTION__)->snake()->toString();
        if (Str::startsWith($func, 'get_')) {
            $func = Str::of($func)->after('get_')->toString();
        }
        $key = Str::of(class_basename(self::class))
            ->snake()
            ->prepend('actions.')
            ->append('.'.$func)
            ->toString();
        return static::transClass($tenantClass, $key);
    }

    public function form(Schema $schema): Schema
    {
        $tenantClass = XotData::make()->getTenantClass();
        $resource = Str::of($tenantClass)
            ->replace('\\Models\\', '\\Filament\\Resources\\')
            ->append('Resource')
            ->toString();
        $this->resource = $resource;

        /** @var array<\Filament\Schemas\Components\Component> $components */
        $components = $this->getFormSchema();

        return $schema->components($components);
    }

    /**
     * @return array<\Filament\Schemas\Components\Component>
     */
    public function getFormSchema(): array
    {
        /** @var array<\Filament\Schemas\Components\Component> $schema */
        return $this->resource::getFormSchema();
    }

    /**
     * @param  array<string, string|int|bool|null>  $data
     */
    protected function handleRegistration(array $data): Model
    {
        $tenantClass = XotData::make()->getTenantClass();

        $tenant = $tenantClass::create($data);
        Assert::implementsInterface($tenant, TenantContract::class);
        Assert::isInstanceOf($tenant, BaseTenant::class);

        return $tenant;
    }
}
